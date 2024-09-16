<script setup>

import { works } from 'src/fake_database/data';

</script>

<template>
  <div v-for="work in works" :key="work.id">
    <p class="q-mt-sm">{{ work.address }}</p>
    <p class="q-mt-sm">{{ work.title }}</p>
    <p class="q-mt-sm">{{ work.description }}</p>
    <p class="q-mt-sm">с {{ work.date_start }} по {{ work.date_end }}</p>
    <div>
      <b>Фотографии проведения работ:</b>
      <div class="narrow-block">
        <q-tabs inline-label class="q-mt-sm q-mb-sm" outside-arrows>
          <q-tab
            v-for="image in work.images"
            :key="image.id"
            class="rounded-borders q-mr-md"
            style="gap: 5%"
          >
            <img style="width: 220px; height: 140px" :src="image.path" alt="">
          </q-tab>
        </q-tabs>
      </div>
    </div>
  </div>
</template>

<style scoped></style>

<script>
</script>
