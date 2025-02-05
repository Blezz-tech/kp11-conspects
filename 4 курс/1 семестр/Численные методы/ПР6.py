import numpy as np

def simple_iteration(A, b, epsilon=1e-4, max_iterations=1000):
    n = len(b)
    x = np.zeros(n)
    
    for iteration in range(max_iterations):
        x_new = np.zeros(n)
        for i in range(n):
            s = sum(A[i][j] * x[j] for j in range(n) if j != i)
            x_new[i] = (b[i] - s) / A[i][i]
        
        if np.linalg.norm(x_new - x) < epsilon:
            print(f"\nСошлось за {iteration + 1} итераций")
            return x_new
        
        x = x_new
    
    raise ValueError("Метод не сошелся за максимальное число итераций")

def resolver(title, data, result):
    print("\n## Задача", title)

    # Условие
    print("\n### Условие:")
    print("\nРешить систему линейных уравнений методом простой итерации с точностью до 0.0001:")
    for index, item in enumerate(data):
        equation = " + ".join([f"({x:.2f}x{i+1})" for i, x in enumerate(item)])
        print(f"\n{equation} = {result[index]}")

    # Решение
    A = np.array(data)
    b = np.array(result)

    print("\n### Решение:")

    with open('ПР6.py', 'r') as file:
        content = file.read()
        print("")
        print("```")
        print(content)
        print("```")

    solution = simple_iteration(A, b)

    # Ответ
    print("\n### Ответ:")
    for i, val in enumerate(solution):
        print(f"\n{['x1', 'x2', 'x3', 'x4'][i]} = {val:.4f}")

    # Проверка
    print("\n### Проверка:")
    result = np.dot(A, solution)
    
    for index, item in enumerate(data):
        equation = " + ".join([f"({x:.2f}x{i+1})" for i, x in enumerate(item)])
        print(f"\n{equation} ≈ {result[index]:.4f}")

tasks = [
    {
        "title": "5",
        "data": [
            [0.18-1, -0.34  , -0.12  ,  0.15],
            [0.11  ,  0.23-1, -0.15  ,  0.32],
            [0.05  , -0.12  ,  0.14-1, -0.18],
            [0.12-1,  0.08  ,  0.06  , -1   ],
        ],
        "result": [1.33, -0.84, 1.16, -0.57],
    },
    {
        "title": "6",
        "data": [
            [0.13-1,  0.23  , -0.44  , -0.05],
            [0.24  , -0.31-1,  0.15  ,  0],
            [0.06  ,  0.15  , -0.23-1,  0],
            [0.72  , -0.08  , -0.05  , -1],
        ],
        "result": [-2.13, 0.18, -1.44, -2.42],
    },
    {
        "title": "7",
        "data": [
            [ 0.17-1,  0.31  , -0.18  ,  0.22],
            [-0.21 ,  0.33-1,  0.22  ,  0],
            [ 0.32  , -0.18  ,  0.05-1, -0.19],
            [ 0.12  ,  0.28  , -0.14  ,  -1],
        ],
        "result": [1.71, -0.62, 0.89, -0.94],
    },
    {
        "title": "8",
        "data": [
            [ 0.13-1,  0.27  , -0.22  , -0.18],
            [-0.21  , -0.45-1,  0.18  ,  0],
            [ 0.12  ,  0.13  , -0.33-1,  0.18],
            [ 0.33  , -0.05  ,  0.06  , -0.28-1],
        ],
        "result": [-1.21, 0.33, 0.48, 0.17],
    }
]

print("# Практическая работа 06. 24.10.2022 (урок 23) 25.10.2022 (урок 24) Тема: Решения систем линейных уравнений методом простой итерации")

for task in tasks:
    resolver(title=task['title'], data=task['data'], result=task['result'])
