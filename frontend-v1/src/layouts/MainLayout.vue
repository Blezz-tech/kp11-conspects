<script>
import FooterPanel from 'src/components/panels/FooterPanel.vue';
import HeaderHeader from 'src/components/panels/HeaderHeader.vue';
import NavMenu from 'src/components/panels/NavMenu.vue';
import { ref } from 'vue'

export default {
  components: { HeaderHeader, NavMenu, FooterPanel },
  setup() {
    return {
      slide: ref(1)
    }
  }
}
</script>

<template>
  <q-layout view="lHh lpR fff" class="m-bg">
    <HeaderHeader />
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
    <div class="narrow-block" style="margin-top: 170px">
      <NavMenu>
      </NavMenu>
    </div>
    <q-page-container class="m-bg" style="padding-top: 0">
      <q-page>
        <div class="narrow-block">
          <router-view />
        </div>
      </q-page>
    </q-page-container>
    <FooterPanel />
  </q-layout>
</template>
