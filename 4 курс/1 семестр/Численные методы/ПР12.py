import numpy as np

def resolver(title, x, y):

    print("\n## Задача", title)

    # Условие
    print("\n### Условие:")
    print("\nЗадание: Для функции f (x), заданной таблично в пяти узлах xi, i = 0, 1, 2, 3, 4, приближенно вычислить определенный интеграл на отрезке [x0; x4], используя формулы Ньютона – Котеса, прямоугольников, трапеций и Симпсона.")

    print(f"\nx = {x}")
    print(f"\ny = {y}")

    # Решение
    print("\n### Решение:")

    with open('ПР12.py', 'r') as file:
        content = file.read()
        print("\n```")
        print(content)
        print("\n```")

    x = np.array(x)
    y = np.array(y)

    def rectangle_method(x, y):
        n = len(x) - 1
        integral = sum((x[i+1] - x[i]) * y[i] for i in range(n))
        return integral

    def trapezoidal_method(x, y):
        n = len(x) - 1
        integral = 0.5 * (y[0] + y[-1])
        for i in range(1, n):
            integral += y[i]
        integral *= (x[1] - x[0])
        return integral

    def simpson_method(x, y):
        n = len(x) - 1
        if n % 2 == 1:
            n -= 1

        h = (x[-1] - x[0]) / n
        integral = y[0] + y[-1]

        for i in range(1, n, 2):
            integral += 4 * y[i]

        for i in range(2, n-1, 2):
            integral += 2 * y[i]

        integral *= h / 3
        return integral

    rectangle_result = rectangle_method(x, y)
    trapezoidal_result = trapezoidal_method(x, y)
    simpson_result = simpson_method(x, y)

    # Ответ
    print("\n### Ответ:")

    print(f"\nМетод прямоугольников: {rectangle_result}")
    print(f"\nМетод трапеций: {trapezoidal_result}")
    print(f"\nМетод Симпсона: {simpson_result}")
    
    print("\n### Проверка:")

    print(f"\nМетод прямоугольников: {rectangle_result}")
    print(f"\nМетод трапеций: {trapezoidal_result}")
    print(f"\nМетод Симпсона: {simpson_result}")

tasks = [
    {
        "title": "1",
        "x": [1.25, 1.27, 1.29, 1.31, 1.33],
        "y": [4.82835, 4.84418, 4.85989, 4.87523, 4.86331],
    },
    {
        "title": "2",
        "x": [13.5, 13.7, 13.9, 14.1, 14.3],
        "y": [4.90583, 4.92007, 4.93459, 4.94882, 4.96571],
    },
    {
        "title": "3",
        "x": [0.145, 0.147, 0.149, 0.151, 0.153],
        "y": [4.97674, 4.99043, 5.00391, 5.01730, 5.03207],
    },
    {
        "title": "4",
        "x": [0.451, 0.452, 0.453, 0.454, 0.455],
        "y": [0.43587, 0.43677, 0.43766, 0.43856, 0.43945],
    },
    {
        "title": "5",
        "x": [0.724, 0.725, 0.726, 0.727, 0.728],
        "y": [0.90000, 0.89957, 0.89914, 0.89870, 0.89825],
    },
    {
        "title": "6",
        "x": [0.349, 0.350, 0.351, 0.352, 0.353],
        "y": [0.34196, 0.34290, 0.34384, 0.34478, 0.34488],
    },
]

print("# Практическая работа 12. 11.12.2024 (уроки 47,48) Тема: Численное интегрирование\n")


for task in tasks:
    title, x, y = task['title'], task['x'], task['y']
    resolver(title, x, y)
