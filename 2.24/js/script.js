{

let menu = document.querySelector(".menu");
let menu_item = document.createElement("li");

menu_item.classList.add("menu-item");
menu_item.innerHTML = "Пятый пункт";
menu.appendChild(menu_item);

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