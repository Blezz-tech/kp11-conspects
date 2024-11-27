import numpy as np
import matplotlib.pyplot as plt

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

def resolver(x, y, x_dots):
    # Вычисление значений интерполяционного полинома
    results = newton_interpolation(x, y, x_dots)

    # Вывод результатов
    for x_dot, result in zip(x_dots, results):
        print(f"f({x_dot}) = {result:.4f}")

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
    plt.show()


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
    x, y, x_dots = task['x'], task['y'], task['x_dots']
    resolver(x, y, x_dots)