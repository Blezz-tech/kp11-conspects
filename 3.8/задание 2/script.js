let age = document.getElementById('age');
function showUser(surname, name) {
    alert("Пользователь " + surname + " " + name + ", его возраст " + this.value);
}
//showUser.apply(age, ["Котик","Василий"]);





let btn = document.querySelector(".button");

btn.addEventListener("click", function() {
    showUser.apply(age, ["Котик","Василий"]);
});