from django.shortcuts import render


# Create your views here.

def index(request):
    context = {
        'title': 'Мерч сталкера',
    }
    return render(request, "products/index.html", context)

def products(request):
    context = {
        'title': 'Каталог мерча сталкера',
        'products': [
            {
                'name': 'Лунный свет',
                'image': '/static/img/artifacts/artefatc-1.png',
                'price': 6000,
                'description': 'Описание артефакта Лунный свет'
            },
            {
                'name': 'Лунный свет',
                'image': '/static/img/artifacts/artefatc-1.png',
                'price': 6000,
                'description': 'Описание артефакта Лунный свет'
            },
            {
                'name': 'Лунный свет',
                'image': '/static/img/artifacts/artefatc-1.png',
                'price': 6000,
                'description': 'Описание артефакта Лунный свет'
            },
            {
                'name': 'Лунный свет',
                'image': '/static/img/artifacts/artefatc-1.png',
                'price': 6000,
                'description': 'Описание артефакта Лунный свет'
            },
            {
                'name': 'Лунный свет',
                'image': '/static/img/artifacts/artefatc-1.png',
                'price': 6000,
                'description': 'Описание артефакта Лунный свет'
            },
        ]
    }
    return render(request, "products/products.html", context)