// SPDX-License-Identifier: GPL-3.0
pragma solidity >0.8.0;

contract TestEstate{

    address admin = 0x4B20993Bc481177ec7E8f571ceCaE8A9e22C02db;

    struct Estate {
        uint id_estate;
        address owner;
        uint square;
        bool pledge; //true - в залоге
    }
    Estate[] public estates;

    struct Order{
        uint id_estate;
        uint price;
        address customer;
        bool status_order; //true - объявление активно
    }
    Order[] public orders;

    constructor(){
        estates.push(Estate(0, 0x5B38Da6a701c568545dCfcB03FcB875f56beddC4, 120, false));
        estates.push(Estate(1, 0x5B38Da6a701c568545dCfcB03FcB875f56beddC4, 15, true));
        estates.push(Estate(2, 0xAb8483F64d9C6d1EcF9b849Ae677dD3315835cb2, 100, false));

        orders.push(Order(2, 5*10**18, address(0), true));
    }

    function addEstate(address owner, uint square) public {
        require(msg.sender == admin, "Not admin");
        estates.push(Estate(estates.length, owner, square, false));
    }

    function addOrder(uint id_estate, uint price) public {
        require(msg.sender == estates[id_estate].owner, "Not you owner");
        require(estates[id_estate].pledge == false, "Estate in pledge");
        require(price > 0, "Enter correct price");
        orders.push(Order(id_estate, price, address(0), true));
    }

    function customerSelected(uint id_order) public payable {
        require(orders[id_order].status_order == true, "Order not active");
        require(orders[id_order].customer == address(0), "Estate allready selected");
        uint id_estate = orders[id_order].id_estate;
        require(estates[id_estate].owner != msg.sender, "You owner!");
        require(msg.value == orders[id_order].price, "Not money");
        orders[id_order].customer = msg.sender;
    }

    function cancel(uint id_order) public {
        require(orders[id_order].status_order == true, "active");
        require(orders[id_order].customer == address(0), "nothing client");
        require(estates[orders[id_order].id_estate].owner == msg.sender, "You owner");
        orders[id_order].status_order = false;
    }
}