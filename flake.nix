{
  inputs = {
    nixpkgs.url = "github:nixos/nixpkgs/nixos-unstable";
    systems.url = "github:nix-systems/default";
    devenv.url = "github:cachix/devenv/v0.6.3";
  };

  outputs = { nixpkgs, devenv, systems, ... }@inputs:
    let forEachSystem = nixpkgs.lib.genAttrs (import systems);
    in {
      devShells = forEachSystem (system:
        let pkgs = nixpkgs.legacyPackages.${system};
        in {
          default = devenv.lib.mkShell {
            inherit inputs pkgs;
            modules = [{

              packages = with pkgs; [
                mysql-workbench
              ];

              languages.php = {
                enable = true;
                version = "8.1";
              };

              services.mysql = {
                enable = true;
                package = pkgs.mariadb;
                initialDatabases = [{ name = "qual-pei"; }];
                ensureUsers = [
                  {
                    name = "root";
                    password = "";
                    ensurePermissions = { "root.*" = "ALL PRIVILEGES"; };
                  }
                ];
                settings = {
                  mysqld = {
                    "bind_address" = "localhost";
                  };
                };
              };

              scripts = {
                EnvClearAll.exec = "rm -rf ./.devenv ./.direnv";
                EnvClearStatic.exec = "rm -rf ./.devenv/state";
              };
            }];
          };
        });
    };
}
