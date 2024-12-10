import numpy as np
import matplotlib.pyplot as plt
import os

os.makedirs("./data/ПР11", exist_ok=True)

def newton_interpolation(x, y, x_dots):
    n = len(x)
    # Вычисление разделенных разностей
    divided_diff = np.zeros((n, n))
    divided_diff[:, 0] = y
    
    for j in range(1, n):
        for i in range(n - j):
            divided_diff[i][j] = (divided_diff[i + 1][j - 1] - divided_diff[i][j - 1]) / (x[i + j] - x[i])
    
    # Вычисление значения полинома в точках x_dots
    results = []
    for x_dot in x_dots:
        result = divided_diff[0][0]
        term = 1.0
        for j in range(1, n):
            term *= (x_dot - x[j - 1])
            result += divided_diff[0][j] * term
        results.append(result)
    
    return results

def resolver(title, x, y, x_dots):
    print("\n## Задача", title)

    # Условие
    print("\n### Условие:")
    print("\nПостроить интерполяционный полином Ньютона и соответствующий график для функции Y, заданной таблично и вычислить значение функции в точках а), б), в).")

    print(f"\nа) {x_dots[0]} б) {x_dots[1]} в) {x_dots[2]}")
    print("\n```")
    print(f"\nx = {x}")
    print(f"\ny = {y}")
    print("\n```")

    # Решение
    print("\n### Решение:")

    with open('ПР11.py', 'r') as file:
        content = file.read()
        print("\n```")
        print(content)
        print("\n```")

    # Вычисление значений интерполяционного полинома
    results = newton_interpolation(x, y, x_dots)

    # Построение графика
    # Создание массива точек для графика интерполяции
    x_plot = np.linspace(min(x), max(x), 100)
    y_plot = []

    for x_val in x_plot:
        # Вычисление значения интерполяционного полинома для каждой точки на графике
        term_value = newton_interpolation(x, y, [x_val])[0]
        y_plot.append(term_value)

    # Построение графиков
    plt.figure(figsize=(10, 6))
    plt.plot(x_plot, y_plot, label='Интерполяционный полином Ньютона', color='blue')
    plt.scatter(x, y, color='red', label='Исходные точки', zorder=5)
    plt.scatter(x_dots, results, color='green', label='Значения в точках', zorder=5)
    plt.title('Интерполяция функции с помощью полинома Ньютона')
    plt.xlabel('x')
    plt.ylabel('y')
    plt.legend()
    plt.grid()
    # plt.show()
    plt.savefig(f"./data/ПР11/task-{title}.jpg", dpi=300, bbox_inches='tight')
    plt.clf()

    # Ответ
    print("\n### Ответ:")

    # Вывод результатов
    for x_dot, result in zip(x_dots, results):
        print(f"\nf({x_dot}) = {result:.4f}")
    
    print(f"\n![График функции задания {title}](./data/ПР11/task-{title}.jpg)")

    print("\n### Проверка:")

    with open('ПР11.py', 'r') as file:
        content = file.read()
        print("\n```")
        print(content)
        print("\n```")

# Данные


tasks = [
    {
        "title": "1",
        "x": [0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6],
        "y": [1, 1.05, 1.2, 1.451, 1.804, 2.266, 2.847],
        "x_dots": [0.15, 0.53, 0.33]
    },
    {
        "title": "2",
        "x": [0, 0.08, 0.16, 0.24, 0.32, 0.40, 0.48],
        "y": [2, 2.474, 2.935, 3.383, 3.832, 4.25, 4.675],
        "x_dots": [0.09, 0.2, 0.45]
    },
    {
        "title": "3",
        "x": [-3, -2, -1, 0, 1, 2, 3],
        "y": [-268, -46, -6, 2, 8, 42, 254],
        "x_dots": [-2.15, -0.15, 2.43]
    },
    {
        "title": "4",
        "x": [7, 8, 9, 10, 11, 12, 13],
        "y": [335, 500, 703, 965, 1267, 1656, 2031],
        "x_dots": [7.25, 9.15, 11.49]
    },
]

for task in tasks:
    title, x, y, x_dots = task['title'], task['x'], task['y'], task['x_dots']
    resolver(title, x, y, x_dots)