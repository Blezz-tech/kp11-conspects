
define e = Character('Эйлин', color="#c8ffc8")

image tutor_1_1 = "tutor_1_1.png"

label start:

    call introduction from _call_introduction
    call tutor_1 from _call_tutor_1

    return


label introduction:

    e "Флексы это такая весёлая дичь"

    return


label tutor_1:
    show tutor_1_1 as truecenter

    e "Урок 1"

    e "Для начала нужно прописать display: flex;"

    e "Офишительное объяснение флексов"

    return


label tutor_2:

    e "Урок 2"

    e "Кудасай"

