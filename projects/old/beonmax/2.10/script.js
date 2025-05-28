let money = +prompt("Ваш бюджет на месяц?", '');
let time = prompt('Введите дату в формате YYYY-MM-DD', '');

let appData = {
	budget: money,
    timeData: time,
	expenses: {},
	optionalExpenses: {},
	income: [],	
	savings: false,
};



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
		console.log("incorrect");
		--i;
	}  
}



// Используем while
// let i = 0;
// while(i < 2)
// {
// 	let article = prompt("Введите обязательную статью расходов в этом месяце", '');
// 	let money = prompt("Во сколько обойдется?", '');

// 	if ( (typeof(article) == "string") &&
// 		 (article.length < 50) &&
// 	     (typeof(article) != null) && (article != '') &&
// 		 (typeof(money) != null) && (money != '') )
// 	{
// 		console.log("done");
// 		appData.expenses[article] = money;
// 	}
// 	else
// 	{
// 		console.log("incorrect");
// 		--i;
// 	}  

// 	++i;
// }


// Используем do while
// let i = 0;
// do
// {
// 	let article = prompt("Введите обязательную статью расходов в этом месяце", '');
// 	let money = prompt("Во сколько обойдется?", '');

// 	if ( (typeof(article) == "string") &&
// 		 (article.length < 50) &&
// 	     (typeof(article) != null) && (article != '') &&
// 		 (typeof(money) != null) && (money != '') )
// 	{
// 		console.log("done");
// 		appData.expenses[article] = money;
// 	}
// 	else
// 	{
// 		console.log("incorrect");
// 		--i;
// 	}  

// 	++i;
// }
// while(i < 2)



appData.moneyPerDay = appData.budget / 30;

alert(`Ежедневный бюджет: ${appData.moneyPerDay}`);

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
