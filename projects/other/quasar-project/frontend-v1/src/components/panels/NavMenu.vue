<script>
import { defineComponent, computed, ref } from 'vue'

export default defineComponent({
  name: "NavMenu"
})
</script>

<template>
  <div class="narrow-block" style="margin-top: 170px">
    <q-tabs inline-label class="q-mt-xl q-mb-xl" outside-arrows>
      <router-link v-for="(item) in menu" :key="item.id" :to="{
        name: 'services.show',
        params: { id: item.file_id }
      }" style="text-decoration: none;">
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
  </div>
</template>

<script setup>


import { navData } from 'src/fake_database/data';

// TODO Удалить роутинг, чтобы все они сылались на /articles/:id
const menu = ref(navData);

const tabStyles = computed(() => (item) => ({
  paddingLeft: '100px',
  background: `url(${item.img}) left center no-repeat`,
  height: '100px',
}));

</script>
