<script>
import { defineComponent } from 'vue'

export default defineComponent({
    name: "HeaderHeader"
})
</script>

<template>
    <q-header class="m-bg">
        <q-toolbar class="narrow-block">
            <q-toolbar-title>
                <div>
                    <div class="q-ma-sm flex">
                        <a href="./"><img src="src/assets/megas.png" alt="" /></a>
                        <div class="flex items-center">
                            <p class="text-grey q-ml-xl" style="font-weight: bold">+7 (495)</p>
                            <h4 class="text-black" style="font-weight: bold">795 93 39</h4>
                        </div>
                        <!-- Добавляем класс для стилизации -->
                        <div class="flex q-col-gutter-md items-center right-aligned">
                            <router-link to="/about">О компании</router-link>
                            <router-link to="/about">Новости</router-link>
                            <router-link to="/works">Наши объекты</router-link>
                            <router-link to="/contacts">Контакты</router-link>
                        </div>
                    </div>
                </div>
            </q-toolbar-title>
        </q-toolbar>
    </q-header>
</template>