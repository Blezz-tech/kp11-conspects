import pandas as pd

# Загрузка данных из файла
data = pd.read_csv('data.csv', sep='\t')

# Применение стилей к таблице
html_table = data.style.set_table_attributes('style="border-collapse: collapse; width: 100%;"') \
    .set_table_styles([{
        'selector': 'th',
        'props': [('text-align', 'center')]
    }, {
        'selector': 'tr:nth-child(odd)',
        'props': [('background-color', '#f2f2f2')]
    }, {
        'selector': 'tr:nth-child(even)',
        'props': [('background-color', '#ffffff')]
    }]).to_html(index=False)

# Вывод HTML-таблицы
print(html_table)
