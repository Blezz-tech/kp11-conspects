import numpy as np
import matplotlib.pyplot as plt
import os
import inspect

os.makedirs("./data/ПР10", exist_ok=True)

# Чистая функция для вычисления полинома Лагранжа
def lagrange_interpolation(x, x_nodes, y_nodes):
    L = 0
    for i in range(len(x_nodes)):
        term = y_nodes[i]
        for j in range(len(x_nodes)):
            if i != j:
                term *= (x - x_nodes[j]) / (x_nodes[i] - x_nodes[j])
        L += term
    return L


def resolver(title, x, a, f, f_name):
    print("\n## Задача", title)

    # Условие
    print("\n### Условие:")
    print("\nПостроить интерполяционный полином Лагранжа для функции f (x) с узлами интерполирования xi, i = 0, 1, 2. Вычислить значения f (x) и полинома Лагранжа в точке a. Построить графики полинома Лагранжа и аппроксимируемой функции f (x) на отрезке [x0, x2].")
    print(f"x = {x}")
    print(f"a = {a}")
    print()

    # Решение
    print("\n### Решение:")

    with open('ПР10.py', 'r') as file:
        content = file.read()
        print("")
        print("```")
        print(content)
        print("```")

    # Узлы интерполирования
    x_nodes = np.array(x)
    y_nodes = f(x_nodes)

    min_x = min(x)
    max_x = max(x)

    # Вычисляем значения
    f_a = f(a)
    L_a = lagrange_interpolation(a, x_nodes, y_nodes)

    # Генерируем значения для графика
    x_values = np.linspace(min_x, max_x, 100)
    f_values = f(x_values)
    L_values = lagrange_interpolation(x_values, x_nodes, y_nodes)

    # Построение графиков
    plt.figure(figsize=(10, 6))
    plt.plot(x_values, f_values, label=f_name, color='blue')
    plt.plot(x_values, L_values, label='Полином Лагранжа', color='red', linestyle='dashed')
    plt.scatter(x_nodes, y_nodes, color='green', label='Узлы интерполирования')
    plt.scatter(a, f_a, color='orange', label=f'f({a}) = {f_a:.4f}', zorder=5)
    plt.scatter(a, L_a, color='purple', label=f'L({a}) = {L_a:.4f}', zorder=5)
    plt.title('Интерполяция Лагранжа')
    plt.xlabel('x')
    plt.ylabel('y')
    plt.axhline(0, color='black', linewidth=0.5, ls='--')
    plt.axvline(0, color='black', linewidth=0.5, ls='--')
    plt.xlim(min_x, max_x)
    plt.legend()
    plt.grid()
    # plt.show()
    plt.savefig(f"./data/ПР10/task-{title}.jpg", dpi=300, bbox_inches='tight')
    plt.clf()

    # Ответ
    print("\n### Ответ:")

    print(f"\nf({a}) = {f_a:.4f}")

    print(f"\nL({a}) = {L_a:.4f}")

    print(f"\n![График функции задания {title}](./data/ПР10/task-{title}.jpg)")

    print("\n### Проверка:")

    with open('ПР10.py', 'r') as file:
        content = file.read()
        print("")
        print("```")
        print(content)
        print("```")

tasks = [
    {
        "title": "1",
        "x": [2, 3, 4],
        "a": 2,
        "f": lambda x: (np.log(x)) ** (13/4)
    },
    {
        "title": "2",
        "x": [9, 11, 13],
        "a": 10,
        "f": lambda x: (np.log(x)) ** (17/4)
    },
    {
        "title": "3",
        "x": [4, 5, 6],
        "a": 4,
        "f": lambda x: (np.log(x)) ** (12/5)
    },
    {
        "title": "4",
        "x": [3, 6, 9],
        "a": 8,
        "f": lambda x: (np.log(x)) ** (4/7)
    },
    {
        "title": "5",
        "x": [5, 6, 7],
        "a": 5,
        "f": lambda x: (np.log(x)) ** (11/3)
    },
    {
        "title": "6",
        "x": [9, 11, 13],
        "a": 11,
        "f": lambda x: (np.log(x)) ** (13/3)
    },
    {
        "title": "7",
        "x": [6, 7, 8],
        "a": 6,
        "f": lambda x: (np.log(x)) ** (11/2)
    },
    {
        "title": "8",
        "x": [10, 12, 14],
        "a": 13,
        "f": lambda x: (np.log(x)) ** (12/11)
    },
    {
        "title": "9",
        "x": [7, 8, 9],
        "a": 7,
        "f": lambda x: (np.log(x)) ** (1/2)
    },
    {
        "title": "10",
        "x": [8, 11, 14],
        "a": 12,
        "f": lambda x: (np.log(x)) ** (13/7)
    },
    {
        "title": "11",
        "x": [8, 9, 10],
        "a": 8,
        "f": lambda x: (np.log(x)) ** (3/2)
    },
    {
        "title": "12",
        "x": [11, 13, 15],
        "a": 12,
        "f": lambda x: (np.log(x)) ** (10/9)
    },
    {
        "title": "13",
        "x": [2, 4, 6],
        "a": 4,
        "f": lambda x: (np.log(x)) ** (11/5)
    },
    {
        "title": "14",
        "x": [9, 12, 15],
        "a": 11,
        "f": lambda x: (np.log(x)) ** (9/7)
    },
    {
        "title": "15",
        "x": [4, 6, 8],
        "a": 6,
        "f": lambda x: (np.log(x)) ** (10/7)
    },
    {
        "title": "16",
        "x": [5, 8, 11],
        "a": 9,
        "f": lambda x: (np.log(x)) ** (9/5)
    },
    {
        "title": "17",
        "x": [6, 8, 10],
        "a": 8,
        "f": lambda x: (np.log(x)) ** (11/7)
    },
    {
        "title": "18",
        "x": [11, 12, 13],
        "a": 11,
        "f": lambda x: (np.log(x)) ** (9/2)
    },
    {
        "title": "19",
        "x": [2, 5, 8],
        "a": 5,
        "f": lambda x: (np.log(x)) ** (12/7)
    },
    {
        "title": "20",
        "x": [6, 9, 12],
        "a": 11,
        "f": lambda x: (np.log(x)) ** (3/5)
    },
    {
        "title": "21",
        "x": [5, 8, 11],
        "a": 8,
        "f": lambda x: (np.log(x)) ** (1/3)
    },
    {
        "title": "22",
        "x": [6, 9, 12],
        "a": 10,
        "f": lambda x: (np.log(x)) ** (10/7)
    },
    {
        "title": "23",
        "x": [2, 6, 10],
        "a": 6,
        "f": lambda x: (np.log(x)) ** (5/3)
    },
    {
        "title": "24",
        "x": [7, 10, 13],
        "a": 12,
        "f": lambda x: (np.log(x)) ** (13/5)
    },
    {
        "title": "25",
        "x": [3, 6, 9],
        "a": 6,
        "f": lambda x: (np.log(x)) ** (9/4)
    },
    {
        "title": "26",
        "x": [2, 4, 6],
        "a": 4,
        "f": lambda x: (np.log(x)) ** (8/9)
    },
    {
        "title": "27",
        "x": [8, 12, 16],
        "a": 9,
        "f": lambda x: (np.log(x)) ** (5/7)
    },
    {
        "title": "28",
        "x": [5, 7, 9],
        "a": 8,
        "f": lambda x: (np.log(x)) ** (7/11)
    },
    {
        "title": "29",
        "x": [3, 5, 7],
        "a": 3,
        "f": lambda x: (np.log(x)) ** (7/13)
    },
    {
        "title": "30",
        "x": [11, 14, 17],
        "a": 15,
        "f": lambda x: (np.log(x)) ** (11/20)
    },
]

for task in tasks:
    title, x, a, f = task['title'], task['x'], task['a'], task['f']
    f_name = inspect.getsource(f).strip().split("lambda x: ")[1]
    resolver(title, x, a, f, f_name)
