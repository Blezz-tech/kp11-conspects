<template>
    <q-footer class="m-bg q-mt-xl">
        <hr class="q-mt-xl">
        <q-toolbar class="narrow-block text-black">
            <q-toolbar-title class="row q-col-gutter-xl q-ma-sm q-mt-lg q-mb-xl">
                <div>
                    <a href=""><img src="src/assets/megas.png" alt=""></a>
                </div>
                <div class="flex column">
                    <h6>Информация</h6>
                    <ul class="q-mt-sm">
                        <li><router-link to="about" class="text-black" style="font-weight: normal" href="">О
                                компании</router-link></li>
                        <li><router-link to="" class="text-black" style="font-weight: normal"
                                href="">Новости</router-link></li>
                        <li><router-link to="documents" class="text-black" style="font-weight: normal"
                                href="">Документы</router-link></li>
                    </ul>
                </div>
                <div>
                    <h6>Услуги</h6>
                    <ul class="q-mt-sm">
                        <li><router-link to="" class="text-black" style="font-weight: normal"
                                href="">Генподряд</router-link></li>
                        <li><router-link to="" class="text-black" style="font-weight: normal" href="">Стена в
                                грунте</router-link>
                        </li>
                        <li><router-link to="" class="text-black" style="font-weight: normal" href="">Монолитное
                                строительство</router-link></li>
                        <li><router-link to="" class="text-black" style="font-weight: normal" href="">Наши
                                объекты</router-link>
                        </li>
                    </ul>
                </div>
                <div>
                    <b>для Москвы и области</b>
                    <div class="row q-col-gutter-sm">
                        <div class="flex items-center">
                            <q-icon size="35px" class="las la-phone" />
                            <h5 style="margin: 0; padding: 0">+7 (495)795-93-39</h5>
                        </div>
                    </div>
                </div>
            </q-toolbar-title>
        </q-toolbar>
    </q-footer>
</template>