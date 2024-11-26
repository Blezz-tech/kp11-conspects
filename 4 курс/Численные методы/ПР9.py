import numpy as np
import matplotlib.pyplot as plt
from sympy import symbols, lambdify, log, sin, cos
import os

os.makedirs("./data/ПР9", exist_ok=True)

def resolver(title, f, x):
    print("\n## Задача", title)

    # Условие
    print("\n### Условие:")
    print("\nДля заданного уравнения f(x) = 0 найти один из его корней методами дихотомии, итераций, Ньютона, хорд и секущих; достичь точности 10–2 методом дихотомии и 10–3 остальными методами.")


    # Решение
    print("\n### Решение:")

    with open('ПР9.py', 'r') as file:
        content = file.read()
        print("")
        print("```")
        print(content)
        print("```")

    f_prime = f.diff(x)

    f_func = lambdify(x, f, 'numpy')
    f_prime_func = lambdify(x, f_prime, 'numpy')

    # Метод Ньютона
    def newton_method(f, f_prime, x0, tol=1e-3, max_iter=100):
        x_n = x0
        for _ in range(max_iter):
            x_n1 = x_n - f(x_n) / f_prime(x_n)
            if abs(x_n1 - x_n) < tol:
                return x_n1
            x_n = x_n1
        return None

    # Метод дихотомии
    def bisection_method(f, a, b, tol=1e-2):
        if f(a) * f(b) >= 0:
            raise ValueError("f(a) and f(b) must have different signs")
        while (b - a) / 2.0 > tol:
            midpoint = (a + b) / 2.0
            if f(midpoint) == 0:
                return midpoint
            elif f(a) * f(midpoint) < 0:
                b = midpoint
            else:
                a = midpoint
        return (a + b) / 2.0

    # Примеры использования методов
    root_newton = newton_method(f_func, f_prime_func, x0=1)

    root_bisection = None
    try:
        root_bisection = bisection_method(f_func, a=1, b=3)
    except:
        None

    # Ответ
    print("\n### Ответ:")

    if root_newton != None:
        print(f"\nКорень методом Ньютона: {root_newton:.4f}")
    else:
        print(f"\nКорень методом Ньютона не может быть найден")

    if root_bisection != None:
        print(f"\nКорень методом дихотомии: {root_bisection:.4f}")
    else:
        print(f"\nКорень методом дихотомии не может быть найден")

    print(f"\n![График функции задания {title}](./data/ПР9/task-{title}.jpg)")

    # Визуализация функции
    x_vals = np.linspace(0.1, 3, 400)
    y_vals = f_func(x_vals)

    plt.plot(x_vals, y_vals)
    plt.axhline(0, color='black', lw=0.5)
    if root_newton != None:
        plt.axvline(root_newton, color='green', linestyle='--', label='Корень Ньютона')
    if (root_bisection != None):
        plt.axvline(root_bisection, color='blue', linestyle='--', label='Корень дихотомии')
    plt.title('График функции ln(x) + x - 2')
    plt.xlabel('x')
    plt.ylabel('f(x)')
    plt.legend()
    plt.grid()
    # plt.show()
    plt.savefig(f"./data/ПР9/task-{title}.jpg", dpi=300, bbox_inches='tight')
    plt.clf()

tasks = [
    {
        "title": "1",
        "f": lambda x: log(x) + x - 2
    },
    {
        "title": "2",
        "f": lambda x: log(x) + x ** 2
    },
    {
        "title": "3",
        "f": lambda x: log(x) + 2 * x ** 2 - 6
    },
    {
        "title": "4",
        "f": lambda x: 2 * log(x) - x ** 2 + 5
    },
    {
        "title": "5",
        "f": lambda x: 2 * log(x) + 2 * x - 3
    },
    {
        "title": "6",
        "f": lambda x: sin(x) + x * 2 - 1
    },
    {
        "title": "7",
        "f": lambda x: sin(x) + 2 * x ** 2 - 5
    },
    {
        "title": "8",
        "f": lambda x: sin(x) - x + 3
    },
    {
        "title": "9",
        "f": lambda x: 3 * sin(x) - x ** 2 + 4
    },
    {
        "title": "10",
        "f": lambda x: 3 * sin(x) + x - 2
    },
    {
        "title": "11",
        "f": lambda x: cos(x) + x ** 3 - 2
    },
    {
        "title": "12",
        "f": lambda x: cos(x) + 2 * x - 3
    },
    {
        "title": "13",
        "f": lambda x: cos(x) - x ** 3 + 2
    },
    {
        "title": "14",
        "f": lambda x: log(x) - x ** 2 + 5
    },
    {
        "title": "15",
        "f": lambda x: log(x) + 2 ** x - 3
    }
]

print("# Практическая работа 09. 21.11.2024 (уроки 35, 36) Тема: Метод Ньютона (касательных) для решения нелинейных уравнений")

for task in tasks:
    x = symbols('x')
    f = task['f'](x)
    resolver(title=task['title'], f=f, x=x)
    if 'x' in globals():
        del globals()['x']
