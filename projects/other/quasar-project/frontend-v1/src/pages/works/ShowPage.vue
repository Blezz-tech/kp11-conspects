<script setup>
import { works } from 'src/fake_database/data';
import { useRoute } from 'vue-router'

const route = useRoute()

function fakeFetch(id) {
  return works.filter(item => item.id == id)[0];
}

const work = fakeFetch(Number(route.params.id));

</script>

<template>
  <p class="q-mt-sm">{{ work.address }}</p>
  <p class="q-mt-sm">{{ work.title }}</p>
  <p class="q-mt-sm">{{ work.description }}</p>
  <p class="q-mt-sm">с {{ work.date_start }} по {{ work.date_end }}</p>
  <div>
    <b>Фотографии проведения работ:</b>
    <div class="narrow-block">
      <q-tabs inline-label class="q-mt-sm q-mb-sm" outside-arrows>
        <q-tab v-for="image in work.images" :key="image.id" class="rounded-borders q-mr-md" style="gap: 5%">
          <img style="width: 220px; height: 140px" :src="image.path" alt="">
        </q-tab>
      </q-tabs>
      <q-tabs v-if="work.long_images !== null" inline-label class="q-mt-sm q-mb-sm" outside-arrows>
        <q-tab v-for="image in work.long_images" :key="image.id" class="rounded-borders q-mr-md" style="gap: 5%">
          <img style="width: 200px;" :src="image.path" alt="">
        </q-tab>
      </q-tabs>
    </div>
  </div>
</template>

<script>


</script>
