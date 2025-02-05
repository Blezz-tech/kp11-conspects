// SPDX-License-Identifier: GPL-3.0

pragma solidity >0.8.0;

contract TestEstate{
    address admin = 0x5B38Da6a701c568545dCfcB03FcB875f56beddC4;

    struct Estate {
        uint id_estate;
        address owner;
        uint square;
        bool pledge;
        // true: в залоге
    }

    Estate[] public estates;

    struct Order{
        uint id_estate;
        uint price;
        address customer;
        bool status_order;
        // true: объявление активно
    }

    Order[] public orders;

    constructor(){
        estates.push(Estate(0, 0xAb8483F64d9C6d1EcF9b849Ae677dD3315835cb2, 120, false));
        estates.push(Estate(1, 0xAb8483F64d9C6d1EcF9b849Ae677dD3315835cb2, 15, true));
        estates.push(Estate(2, 0x4B20993Bc481177ec7E8f571ceCaE8A9e22C02db, 100, false));

        orders.push(Order(2, 5*10**18, address(0), true));
    }

    function addEstate(address owner, uint square) public {
        require(msg.sender == admin, 'Not admin');
        estates.push(Estate(estates.length, owner, square, false));
    }

    function addOrder(uint id_estate, uint price)public {
        require(msg.sender == estates[id_estate].owner ,'Not owner');
        require(estates[id_estate].pledge == false, 'in pledge');
        require(price > 0, 'Enter price');
        orders.push(Order(id_estate, price, address(0), true));
    }

    function customerSelect(uint id_order) public payable {
        require(orders[id_order].status_order == true, 'order not act');
        require(orders[id_order].customer == address(0), 'estate all ready selected');
        require(estates[orders[id_order].id_estate].owner != msg.sender, 'You owner');
        require(msg.value == orders[id_order].price, 'not money');
        orders[id_order].customer = msg.sender;
    }

    function cancelOrder(uint id_order) public {
        require(msg.sender == estates[orders[id_order].id_estate].owner, "You're not a owner");
        require(orders[id_order].status_order == true, "Status already true");
        if(orders[id_order].customer != address(0)){
            payable (orders[id_order].customer).transfer(orders[id_order].price);
        }
        orders[id_order].status_order = false;
    }

    function confirmOrder(uint id_order) public payable {
        require(msg.sender == estates[orders[id_order].id_estate].owner, "You're not a owner");
        require(orders[id_order].status_order, "Order already canceled");
        require(orders[id_order].customer != address(0), "No customers");
        payable (estates[orders[id_order].id_estate].owner).transfer(orders[id_order].price);
        estates[orders[id_order].id_estate].owner = orders[id_order].customer;
        orders[id_order].status_order = false;
    }
}
