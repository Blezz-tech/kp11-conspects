<script setup>
import { ref } from 'vue';

const first_block = ref([
    {
        "id": 1,
        "to": "about",
        "title": "О компании",
    },
    {
        "id": 2,
        "to": "",
        "title": "Новости",
    },
    {
        "id": 3,
        "to": "documents",
        "title": "Документы",
    },
]);

const second_block = ref([
    {
        "id": 1,
        "to": "",
        "title": "Генподряд",
    },
    {
        "id": 2,
        "to": "",
        "title": "Стена в грунте",
    },
    {
        "id": 3,
        "to": "",
        "title": "Монолитное строительство",
    },
    {
        "id": 4,
        "to": "",
        "title": "Наши объекты",
    },
]);

</script>

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
                        <li
                            v-for="item in first_block"
                            :key="item.id"
                        >
                            <router-link
                                :to="item.to"
                                class="text-black"
                                style="font-weight: normal"
                            > {{ item.title }}
                            </router-link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h6>Услуги</h6>
                    <ul class="q-mt-sm">
                        <li
                            v-for="item in second_block"
                            :key="item.id"
                        >
                            <router-link
                                :to="item.to"
                                class="text-black"
                                style="font-weight: normal"
                            > {{ item.title }}
                            </router-link>
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