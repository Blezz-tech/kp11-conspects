
define e = Character('Эйлин', color="#c8ffc8")

image display flex = "lol kek.png"

label start:

    call introduction from _call_introduction
    call tutor_1 from _call_tutor_1

    return


label introduction:
    show taunka at right

    e "Флексы это такая весёлая дичь"

    return


label tutor_1:
    show display flex at topleft

    e "Урок 1"

    e "Для начала нужно прописать display: flex;"

    return
