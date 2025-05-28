{
let menu = document.querySelector(".menu");

let menuItemMas = document.getElementsByClassName("menu-item");
menu.insertBefore(menuItemMas[2], menuItemMas[1]);    

let addLi = document.createElement("li");
addLi.classList.add("menu-item");
addLi.innerHTML = "Пятый пункт";
menu.appendChild(addLi);

let body = document.body;
document.body.style.backgroundImage = `url("img/apple_true.jpg")`;

let title = document.querySelector("#title");
title.innerHTML = "Мы продаем только подлинную технику Apple";

let adv = document.querySelector(".adv");
adv.remove();

let ask = prompt("Какое у вас отношение к технике apple?", "");
let divPrompt = document.querySelector("#prompt");
divPrompt.appendChild(document.createTextNode(ask));
}