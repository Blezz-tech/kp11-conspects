<script>
import { defineComponent, computed, ref } from 'vue'

export default defineComponent({
  name: "NavMenu"
})
</script>

<template>
  <q-tabs inline-label class="q-mt-xl q-mb-xl" outside-arrows>
    <router-link
      v-for="(item) in menu"
      :key="item.id" :to="{
        name: 'Service',
        params: {id: item.id }
      }"
      style="text-decoration: none;"
    >
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div :style="tabStyles(item)">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">{{ item.title }}</b>
            <h5>{{ item.subtitle }}</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
  </q-tabs>
</template>

<script setup>

// TODO Удалить роутинг, чтобы все они сылались на /articles/:id
const menu = ref([
  {
    'id': 1,
    'title': 'ген',
    'subtitle': 'подряд',
    'img': '/src/assets/1.png',
  },
  {
    'id': 2,
    'title': 'стена',
    'subtitle': 'в грунте',
    'img': '/src/assets/2.png',
  },
  {
    'id': 3,
    'title': 'монолитное',
    'subtitle': 'строительство',
    'img': '/src/assets/3.png',
  },
  {
    'id': 4,
    'title': 'шпунтовое',
    'subtitle': 'ограждение',
    'img': '/src/assets/4.png',
  },
  {
    'id': 5,
    'title': 'Буронабивные',
    'subtitle': 'Cваи',
    'img': '/src/assets/5.png',
  },
  {
    'id': 6,
    'title': 'Буроинъекционные',
    'subtitle': 'Cваи',
    'img': '/src/assets/6.png',
  },
  {
    'id': 7,
    'title': 'РИТ, ЭРСТ',
    'subtitle': 'Cваи',
    'img': '/src/assets/7.png',
  },
  {
    'id': 8,
    'title': 'гидро',
    'subtitle': 'изоляция',
    'img': '/src/assets/8.png',
  },
  {
    'id': 9,
    'title': 'Разработка',
    'subtitle': 'котлованов',
    'img': '/src/assets/9.png',
  },
  {
    'id': 10,
    'title': 'Укрепление',
    'subtitle': 'грунтов',
    'img': '/src/assets/10.png',
  }
]);

const tabStyles = computed(() => (item) => ({
  paddingLeft: '100px',
  background: `url(${item.img}) left center no-repeat`,
  height: '100px',
}));

</script>
