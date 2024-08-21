<script>
import { defineComponent, computed, ref } from 'vue'

export default defineComponent({
  name: "NavMenu"
})
</script>

<template>
  <q-tabs inline-label class="q-mt-xl q-mb-xl" outside-arrows>
    <router-link v-for="(item, index) in menu" :key="index" :to="item.tmp_routing" style="text-decoration: none;">
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
    'title': 'ген',
    'subtitle': 'подряд',
    'img': '/src/assets/1.png',
    'tmp_routing': 'podryad'
  },
  {
    'title': 'стена',
    'subtitle': 'в грунте',
    'img': '/src/assets/2.png',
    'tmp_routing': 'wallgrunt'
  },
  {
    'title': 'монолитное',
    'subtitle': 'строительство',
    'img': '/src/assets/3.png',
    'tmp_routing': 'monolitnoe-stroitelstvo'
  },
  {
    'title': 'шпунтовое',
    'subtitle': 'ограждение',
    'img': '/src/assets/4.png',
    'tmp_routing': 'shpuntovoe-ograzhdenie'
  },
  {
    'title': 'Буронабивные',
    'subtitle': 'Cваи',
    'img': '/src/assets/5.png',
    'tmp_routing': 'buronabivnye-svai'
  },
  {
    'title': 'Буроинъекционные',
    'subtitle': 'Cваи',
    'img': '/src/assets/6.png',
    'tmp_routing': 'buroinektsionnye-svai'
  },
  {
    'title': 'РИТ, ЭРСТ',
    'subtitle': 'Cваи',
    'img': '/src/assets/7.png',
    'tmp_routing': 'sss'
  },
  {
    'title': 'гидро',
    'subtitle': 'изоляция',
    'img': '/src/assets/8.png',
    'tmp_routing': 'sss'
  },
  {
    'title': 'Разработка',
    'subtitle': 'котлованов',
    'img': '/src/assets/9.png',
    'tmp_routing': 'sss'
  },
  {
    'title': 'Укрепление',
    'subtitle': 'грунтов',
    'img': '/src/assets/10.png',
    'tmp_routing': 'ssss'
  }
]);

const tabStyles = computed(() => (item) => ({
  paddingLeft: '100px',
  background: `url(${item.img}) left center no-repeat`,
  height: '100px',
}));

</script>
