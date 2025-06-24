<script>
import FooterPanel from 'src/components/panels/FooterPanel.vue';
import HeaderHeader from 'src/components/panels/HeaderHeader.vue';
import ImagesSlider from 'src/components/panels/ImagesSlider.vue';
import NavMenu from 'src/components/panels/NavMenu.vue';

export default {
  components: {
    HeaderHeader,
    NavMenu,
    ImagesSlider,
    FooterPanel,
  },
}

</script>

<template>
  <q-layout view="lHh lpR fff" class="m-bg">
    <HeaderHeader />
    <ImagesSlider />
    <NavMenu />
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
