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
};


function chooseExpenses()
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
}
chooseExpenses();


function detectDayBudget()
{
	appData.moneyPerDay = +(appData.budget / 30).toFixed(2);
	alert(`Ежедневный бюджет: ${appData.moneyPerDay}`);
}
detectDayBudget();


function detectLevel()
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
}
detectLevel();


function checkSavings()
{
	if (appData.savings == true)
	{
		let save = +prompt("Какова сумма накоплений?", "");
		let percent = +prompt("Под какой процент", "");

		appData.monthIncome = +(save/12/100*percent).toFixed(3);
		alert(`Доход в месяц с вашего депозита: ${appData.monthIncome}`);
	}
}
checkSavings();


function chooseOptExpenses()
{
	for (let i = 1; i <= 3; i++) {
        let answer = prompt("Статья необязательных расходов?");
        appData.optionalExpenses[i] = answer;
        console.log(appData.optionalExpenses[i]);
    }
}
chooseOptExpenses();