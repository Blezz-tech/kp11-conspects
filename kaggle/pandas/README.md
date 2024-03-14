# Pandas

## Creating, Reading and Writing

### 1

```python
fruits = pd.DataFrame({ "Apples": [ 30 ], "Bananas": [ 21 ]})

q1.check()
fruits
```

### 2

```python
fruit_sales = pd.DataFrame(
        [ [35, 21]
        , [41, 34]
        ]
    , columns=["Apples", "Bananas"]
    , index=["2017 Sales", "2018 Sales"]
    )

q2.check()
fruit_sales
```

### 3

```python
ingredients = pd.Series(
    ["4 cups", "1 cup", "2 large", "1 can"],
    name='Dinner',
    index=[ "Flour", "Milk", "Eggs", "Spam"]
    )

q3.check()
ingredients
```

### 4

```python
reviews = pd.read_csv("../input/wine-reviews/winemag-data_first150k.csv", index_col=0)

q4.check()
reviews
```

### 5

```python
animals.to_csv("cows_and_goats.csv")

q5.check()
```

## Indexing, Selecting & Assigning

### 1

```python
desc = reviews["description"]

q1.check()
```

### 2

```python
first_description = reviews.description.iloc[0]

q2.check()
first_description
```

### 3

```python
first_row = reviews.iloc[0]

q3.check()
first_row
```

### 4

```python
first_descriptions = reviews.description.iloc[0:10]

q4.check()
first_descriptions
```

### 5

```python
sample_reviews = reviews.iloc[[1,2,3,5,8]]

q5.check()
sample_reviews
```

### 6

```python
df = reviews.loc[[0,1,10,100], ["country", "province", "region_1", "region_2"]]

q6.check()
df
```

### 7

```python
df = reviews.loc[0:99, ["country", "variety"]]

q7.check()
df
```

### 8

```python
italian_wines =  reviews[reviews.country == 'Italy']

q8.check()
```

### 9

```python

```

### 10

```python

```

## Summary Functions and Maps

### 1

```python

```

### 2

```python

```

### 3

```python

```

### 4

```python

```

### 5

```python

```

### 6

```python

```

### 7

```python

```

### 8

```python

```

### 9

```python

```

### 10

```python

```

## Grouping and Sorting

### 1

```python

```

### 2

```python

```

### 3

```python

```

### 4

```python

```

### 5

```python

```

### 6

```python

```

### 7

```python

```

### 8

```python

```

### 9

```python

```

### 10

```python

```

## Data Types and Missing Values

### 1

```python

```

### 2

```python

```

### 3

```python

```

### 4

```python

```

### 5

```python

```

### 6

```python

```

### 7

```python

```

### 8

```python

```

### 9

```python

```

### 10

```python

```

## Renaming and Combining

### 1

```python

```

### 2

```python

```

### 3

```python

```

### 4

```python

```

### 5

```python

```

### 6

```python

```

### 7

```python

```

### 8

```python

```

### 9

```python

```

### 10

```python

```

