let startBtn              = document.querySelector("#start");

let budgetValue           = document.querySelector(".budget-value"),
    dayBudgetValue        = document.querySelector(".daybudget-value"),
    levelValue            = document.querySelector(".level-value"),
    expensesValue         = document.querySelector(".expenses-value"),
    optionalExpensesValue = document.querySelector(".optionalexpenses-value"),
    incomeValue           = document.querySelector(".income-value"),
    monthSavingsValue     = document.querySelector(".monthsavings-value"),
    yearSavingsValue      = document.querySelector(".yearsavings-value");
    
let expensesItem          = document.querySelectorAll(".expenses-item"),
    optionalExpensesItem  = document.querySelectorAll(".optionalexpenses-item");

let expensesBtn           = document.querySelector(".expenses-item-btn"),
    optionalExpensesBtn   = document.querySelector(".optionalexpenses-btn"),
    countBtn              = document.querySelector(".count-budget-btn");

let incomeItem            = document.querySelector("#income"),
    checkSavings          = document.querySelector("#savings"),
    sumValue              = document.querySelector("#sum"),
    percentValue          = document.querySelector("#percent");

let yearValue             = document.querySelector(".year-value"),
    monthValue            = document.querySelector(".month-value"),
    dayValue              = document.querySelector(".day-value");


let money, time;

expensesBtn.disabled = true;
optionalExpensesBtn.disabled = true;
countBtn.disabled = true;

startBtn.addEventListener('click', () => {
    time = prompt('Введите дату в формате YYYY-MM-DD', '');
    money = +prompt("Ваш бюджет на месяц?", '');

    while (isNaN(money) || money == '' || money == null) {
        money = prompt("Ваш бюджет?", "");
    }
    appData.budget = money;
    budgetValue.textContent = money.toFixed();

    appData.timeData = time;
    let parseDate    = new Date(Date.parse(time));
    yearValue.value  = parseDate.getFullYear();
    monthValue.value = parseDate.getMonth() + 1;
    dayValue.value   = parseDate.getDate();

    expensesBtn.disabled = false;
    optionalExpensesBtn.disabled = false;
    countBtn.disabled = false;
});

expensesBtn.addEventListener('click', () => {
    let sum = 0;
    for (let i = 0; i < expensesItem.length; i++) {
        let a = expensesItem[i].value,
            b = expensesItem[++i].value;

        if ((typeof(a)) != null && a != '' &&
            (typeof(b)) != null && b != '' && a.length < 50) {
            appData.expenses[a] = b;
            sum += +b;
        } 
        expensesValue.textContent = sum;
    }
});

optionalExpensesBtn.addEventListener('click', () => {
    for (let i = 0; i < optionalExpensesItem.length; i++) {
		let opt = optionalExpensesItem[i].value;
        appData.optionalExpenses[i] = opt;
        optionalExpensesValue.textContent += opt + ' ';
	}
});

countBtn.addEventListener('click', () => {
    if (appData.budget != undefined) {
        appData.moneyPerDay = ((appData.budget - +expensesValue.textContent) / 30).toFixed();
        dayBudgetValue.textContent = appData.moneyPerDay;

        let text = "";
        if (appData.moneyPerDay <= 100) {
            text = 'Минимальный уровень достатка';
        } else if (100 < appData.moneyPerDay && appData.moneyPerDay < 2000) {
            text = 'Средний уровень достатка';
        } else if (2000 <= appData.moneyPerDay) {
            text = 'Высокий уровень достатка';
        } else {
            text = 'Произошла ошибка';
        }
        levelValue.textContent = text;
    } else {
        dayBudgetValue.textContent = 'Произошла ошибка';
    }
});

incomeItem.addEventListener('input', () => {
    let items = incomeItem.value;
    appData.income = items.split(',');
    incomeValue.textContent = appData.income;
});

checkSavings.addEventListener("click", () => {
    if (appData.savings == true) {
        appData.savings = false;
    } else {
        appData.savings = true;
    }
});

sumValue.addEventListener('input', () => {
    if (appData.savings == true) {
        let sum = +sumValue.value;
        let percent = +percentValue.value;

        appData.monthIncome = sum/100/12*percent;
        appData.yearIncome = sum/100*percent;

        monthSavingsValue.textContent = appData.monthIncome.toFixed(1);
        yearSavingsValue.textContent = appData.yearIncome.toFixed(1);
    }
});

percentValue.addEventListener('input', () => {
    if (appData.savings == true) {
        let sum = +sumValue.value;
        let percent = +percentValue.value;

        appData.monthIncome = sum/100/12*percent;
        appData.yearIncome = sum/100*percent;

        monthSavingsValue.textContent = appData.monthIncome.toFixed(1);
        yearSavingsValue.textContent = appData.yearIncome.toFixed(1);
    }
});

const appData = {
	budget: money,
	expenses: {},
	optionalExpenses: {},
    income: [],
	timeData: time,
    savings: false
};
