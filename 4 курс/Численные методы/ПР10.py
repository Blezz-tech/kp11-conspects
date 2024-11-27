import numpy as np
import matplotlib.pyplot as plt

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


# Определяем функцию f(x)
def f(x):
    return (np.log(x))**(13/4)

# Узлы интерполирования
x_nodes = np.array([2, 3, 4])
y_nodes = f(x_nodes)

# Точка для вычисления
a = 2.5

# Вычисляем значения
f_a = f(a)
L_a = lagrange_interpolation(a, x_nodes, y_nodes)

# Генерируем значения для графика
x_values = np.linspace(2, 4, 100)
f_values = f(x_values)
L_values = lagrange_interpolation(x_values, x_nodes, y_nodes)

# Построение графиков
plt.figure(figsize=(10, 6))
plt.plot(x_values, f_values, label='f(x) = (ln(x))^(13/4)', color='blue')
plt.plot(x_values, L_values, label='Полином Лагранжа', color='red', linestyle='--')
plt.scatter(x_nodes, y_nodes, color='green', label='Узлы интерполирования')
plt.scatter(a, f_a, color='orange', label=f'f({a}) = {f_a:.4f}', zorder=5)
plt.scatter(a, L_a, color='purple', label=f'L({a}) = {L_a:.4f}', zorder=5)
plt.title('Интерполяция Лагранжа')
plt.xlabel('x')
plt.ylabel('y')
plt.axhline(0, color='black', linewidth=0.5, ls='--')
plt.axvline(0, color='black', linewidth=0.5, ls='--')
plt.legend()
plt.grid()
plt.show()

# Ответ
print(f"f({a}) = {f_a:.4f}")
print(f"L({a}) = {L_a:.4f}")
