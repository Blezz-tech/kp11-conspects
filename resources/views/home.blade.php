<x-layout>
    <h1 class="text-center">Главная страница</h1>
    <h3 class="text-center">Всего выполнено заявок: <strong>{{ $totalAcceptedTickets }}</strong></h3>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            @foreach ($tickets as $i => $ticket)
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="{{ $i }}"
                    @class([
                        "active" => $i == 0
                    ])
                    aria-current="{{$i == 0 ? 'true' : ''}}"
                    aria-label="Slide {{ $i }}">
                </button>

            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($tickets as $i => $ticket)
                <div @class([
                    'carousel-item' => true,
                    'active' => $i == 0,
                ])>
                    <img src="{{ asset($ticket->photo_after) }}" style="width: 100%; height: 480px;" class="d-block" alt="Фоточка">
                    <div class="carousel-caption d-none d-md-block bg-secondary" style="--bs-bg-opacity: .75;">
                        <h5>{{$ticket->s_title}}</h5>
                        <p>{{$ticket->category->name}} {{$ticket->created_at}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыжущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>


    @foreach ($tickets as $ticket)
        <div id="imba{{$i}}" class="mt-3"></div>
        <style>
            #imba{{$i}} {
                width: 100%;
                height: 480px;

                transition: background 1s;

                background: url({{ asset($ticket->photo_after) }});
            }

            #imba{{$i}}:hover {
                background: url({{ asset($ticket->photo_before) }});
            }
        </style>
    @endforeach
</x-layout>
