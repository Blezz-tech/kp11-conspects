<script>
import { defineComponent, computed, ref } from 'vue'

export default defineComponent({
  name: "SideBar"
})

</script>

<script setup>
import { navData } from 'src/lib/data';

const menu = ref(navData);

</script>

<template>
    <div class="bg-white rounded-borders shadow-24" style="margin-left: auto;">
        <h4 class="q-ma-xl">Все наши услуги</h4>
        <ul class="q-ma-xl">
            <li
                v-for="item in menu"
                :key="item.id"
            >
                <router-link
                    :to="{ name: 'Service', params: {id: item.file_id }}"
                    style="text-decoration: none;"
                >{{ item.full_name }}</router-link>
            </li>
        </ul>
    </div>
</template>