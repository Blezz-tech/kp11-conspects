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


    # Вычисляем значения
    f_a = f(a)
    L_a = lagrange_interpolation(a, x_nodes, y_nodes)

    # Генерируем значения для графика
    x_values = np.linspace(2, 4, 100)
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
    plt.xlim(min(x), max(x))
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
        "a": 2.5,
        "f": lambda x: (np.log(x))**(13/4)
    }
]

for task in tasks:
    title, x, a, f = task['title'], task['x'], task['a'], task['f']
    f_name = inspect.getsource(f).strip().split("lambda x: ")[1]
    resolver(title, x, a, f, f_name)
