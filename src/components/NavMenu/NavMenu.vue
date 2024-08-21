<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: "NavMenu"
})
</script>

<template>
  <q-tabs inline-label class="q-mt-xl q-mb-xl" outside-arrows>
    <router-link to="podryad" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/1.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">ген</b>
            <h5>подряд</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="wallgrunt" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/2.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">стена</b>
            <h5>в грунте</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="monolitnoe-stroitelstvo" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/3.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">монолитное</b>
            <h5>строительство</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="shpuntovoe-ograzhdenie" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/4.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">шпунтовое</b>
            <h5>ограждение</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="buronabivnye-svai" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/5.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">Буронабивные</b>
            <h5>Cваи</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="buroinektsionnye-svai" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/6.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">Буроинъекционные</b>
            <h5>Cваи</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="sss" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/7.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">РИТ, ЭРСТ</b>
            <h5>Cваи</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="sss" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/8.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">гидро</b>
            <h5>изоляция</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="sss" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/9.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">Разработка</b>
            <h5>котлованов</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
    <router-link to="ssss" style="text-decoration: none;">
      <q-tab class="bg-white rounded-borders q-mr-md" style="gap: 5%">
        <div style="padding-left: 100px; background: url(src/assets/10.png) left center no-repeat;height:100px;">
          <div class="column justify-center full-height items-start">
            <b class="no-underline text-black">Укрепление</b>
            <h5>грунтов</h5>
          </div>
        </div>
      </q-tab>
    </router-link>
  </q-tabs>
</template>
