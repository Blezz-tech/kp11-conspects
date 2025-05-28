let money = prompt("Ваш бюджет на месяц?", '');
let time = prompt('Введите дату в формате YYYY-MM-DD', '');

let appData = {
	budget: money,
    timeData: time,
	expenses: {},
	optionalExpenses: {},
	income: [],	
	savings: false,
};

say();
say();

alert(appData.budget / 30);


function say()
{
    let article = prompt("Введите обязательную статью расходов в этом месяце", '');
	let money = prompt("Во сколько обойдется?", '');
    appData.expenses.article = money;
}