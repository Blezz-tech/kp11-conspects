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
    <div style="background-color: #212c32;">
        <div class="narrow-block bg-white relative-position" style="top: 125px">
            <q-carousel animated v-model="slide" arrows infinite>
                <q-carousel-slide :name="1" img-src="https://cdn.quasar.dev/img/mountains.jpg" />
                <q-carousel-slide :name="2" img-src="https://cdn.quasar.dev/img/parallax1.jpg" />
                <q-carousel-slide :name="3" img-src="https://cdn.quasar.dev/img/parallax2.jpg" />
                <q-carousel-slide :name="4" img-src="https://cdn.quasar.dev/img/quasar.jpg" />
            </q-carousel>
        </div>
    </div>
</template>