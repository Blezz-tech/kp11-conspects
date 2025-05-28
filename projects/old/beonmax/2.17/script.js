let money, time;

start();

function start()
{
	money = +prompt("Ваш бюджет на месяц?", '');
	time = prompt('Введите дату в формате YYYY-MM-DD', '');

	while(isNaN(money) || money == '' || money == null)
	{
		money = +prompt("Ваш бюджет на месяц?", '');
	}
}

let appData = {
	budget: money,
    timeData: time,
	expenses: {},
	optionalExpenses: {},
	income: [],	
	savings: true,
	chooseExpenses: function()
	{
		for (let i = 0; i < 2; ++i) 
		{
			let article = prompt("Введите обязательную статью расходов в этом месяце", '');
			let money = prompt("Во сколько обойдется?", '');
		
			if ( (typeof(article) == "string") &&
				 (article.length < 50) &&
				 (typeof(article) != null) && (article != '') &&
				 (typeof(money) != null) && (money != '') )
			{
				console.log("done");
				appData.expenses[article] = money;
			}
			else
			{
				--i;
			}  
		}
	},
	detectDayBudget: function()
	{
		appData.moneyPerDay = +(appData.budget / 30).toFixed(2);
		alert(`Ежедневный бюджет: ${appData.moneyPerDay}`);
	},
	detectLevel: function()
	{
		if (appData.moneyPerDay < 100)
		{
			console.log("Минимальный уровень достатка");
		} 
		else if (100 <= appData.moneyPerDay && appData.moneyPerDay <= 2000 )
		{
			console.log("Средний уровень достатка");
		} 
		else if (2000 < appData.moneyPerDay )
		{
			console.log("Выский уровень достатка");
		} 
		else
		{
			console.log("Ошибка");
		}
	},
	checkSavings: function()
	{
		if (appData.savings == true)
		{
			let save = +prompt("Какова сумма накоплений?", "");
			let percent = +prompt("Под какой процент", "");
	
			appData.monthIncome = +(save/12/100*percent).toFixed(3);
			alert(`Доход в месяц с вашего депозита: ${appData.monthIncome}`);
		}
	},
	chooseOptExpenses()
	{
		for (let i = 1; i <= 3; i++) {
			let answer = prompt("Статья необязательных расходов?");
			appData.optionalExpenses[i] = answer;
			console.log(appData.optionalExpenses[i]);
		}
	},
	chooseIncome: function()
	{
		let items = prompt("Что принесет дополнительный доход? (Перечислите через запятую)", "");

        if ( (items == "") ||
		   (typeof(items) == null) ||
		   (typeof(items) != "string") ) {
            console.log("Вы ввели некорректное значение");
        } else {
            appData.income = items.split(", ");
            appData.income.push(prompt("Может что-то еще?"));
            appData.income.sort();
        }

        appData.income.forEach ( (itemMas, i) => alert(`Способы доп. заработка: ${i+1} - ${itemMas}`));
	},
};

appData.chooseExpenses();
appData.chooseOptExpenses();

appData.detectDayBudget();
appData.detectLevel();

appData.checkSavings();
appData.chooseIncome();

for (let key in appData) {
    console.log(`Наша программа включает в себя данные: ${key} - ${appData[key]}`);
}