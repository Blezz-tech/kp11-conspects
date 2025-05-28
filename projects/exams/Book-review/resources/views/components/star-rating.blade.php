<div>
    {{-- Здесь будут звезды --}}
    @if ($rating)
        @for ($i = 1; $i <= $rating; $i++)
            &#9733
        @endfor
        @for ($j = $rating + 1; $j <= 5; $j++)
            &#9734
        @endfor
    @else
        Оценок нету
    @endif
</div>
