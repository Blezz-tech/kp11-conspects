<script>
import { ref } from 'vue'

export default {
  setup() {
    return {
      slide: ref(1)
    }
  }
}
</script>

<template>
    <q-carousel swipeable animated arrows v-model="slide" v-model:fullscreen="fullscreen" infinite>
        <q-carousel-slide :name="1" img-src="https://cdn.quasar.dev/img/mountains.jpg" />
        <q-carousel-slide :name="2" img-src="https://cdn.quasar.dev/img/parallax1.jpg" />
        <q-carousel-slide :name="3" img-src="https://cdn.quasar.dev/img/parallax2.jpg" />
        <q-carousel-slide :name="4" img-src="https://cdn.quasar.dev/img/quasar.jpg" />

        <template v-slot:control>
            <q-carousel-control position="bottom-right" :offset="[18, 18]">
                <q-btn no-caps class="btn text-white" :to="{ name: '49-kvesisskaya' }">Подробнее</q-btn>
            </q-carousel-control>
        </template>
    </q-carousel>
</template>