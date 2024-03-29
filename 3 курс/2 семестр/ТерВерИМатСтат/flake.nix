{
  description = "LuaLaTeX build env.";

  inputs = {
    nixpkgs.url = "github:nixos/nixpkgs/nixos-unstable";
  };

  outputs = { self, nixpkgs } @inputs: let
    system = "x86_64-linux";
    lib    = nixpkgs.lib;
    pkgs   = nixpkgs.legacyPackages.${system};
  in {
    devShells.${system} = {
      default = pkgs.mkShell rec {
        nativeBuildInputs = with pkgs; [
          graphviz
          nushellFull
          pandoc
          python311Full
          python311Packages.jupyter
          python311Packages.matplotlib
          python311Packages.numpy
          python311Packages.scipy
          python311Packages.nbconvert
          python311Packages.statsmodels
        ];
        buildInputs = with pkgs; [];
      };
    };
  };
}
