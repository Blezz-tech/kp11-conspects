<template>
  <q-layout view="lHh lpR fff" class="m-bg">

    <q-header class="m-bg">
      <q-toolbar class="narrow-block">
        <q-toolbar-title>
          <div>
            <div class="q-ma-sm flex">
              <a href="./"><img src="src/assets/megas.png" alt=""/></a>
              <div class="flex items-center">
                <p class="text-grey q-ml-xl" style="font-weight: bold">+7 (495)</p>
                <h4 class="text-black" style="font-weight: bold">795 93 39</h4>
              </div>
              <!-- Добавляем класс для стилизации -->
              <div class="flex q-col-gutter-md items-center right-aligned">
                <router-link to="/about">О компании</router-link>
                <router-link to="/about">Новости</router-link>
                <router-link to="/about">Наши объекты</router-link>
                <router-link to="/contacts">Контакты</router-link>
              </div>
            </div>
          </div>
        </q-toolbar-title>
      </q-toolbar>
    </q-header>



    <div style="background-color: #212c32;">
      <div class="narrow-block bg-white relative-position" style="top: 125px">
        <q-carousel
          animated
          v-model="slide"
          arrows
          infinite
        >
          <q-carousel-slide :name="1" img-src="https://cdn.quasar.dev/img/mountains.jpg" />
          <q-carousel-slide :name="2" img-src="https://cdn.quasar.dev/img/parallax1.jpg" />
          <q-carousel-slide :name="3" img-src="https://cdn.quasar.dev/img/parallax2.jpg" />
          <q-carousel-slide :name="4" img-src="https://cdn.quasar.dev/img/quasar.jpg" />


        </q-carousel>

      </div>
    </div>
    <div class="narrow-block" style="margin-top: 170px">
      <q-tabs inline-label class="q-mt-xl q-mb-xl"
              outside-arrows>
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
    </div>






    <q-page-container class="m-bg" style="padding-top: 0">
      <q-page>
        <div class="narrow-block" >
          <router-view/>
        </div>
      </q-page>
    </q-page-container>
    <q-footer class="m-bg q-mt-xl">
      <hr class="q-mt-xl">
      <q-toolbar class="narrow-block text-black">
        <q-toolbar-title class="row q-col-gutter-xl q-ma-sm q-mt-lg q-mb-xl">
          <div>
            <a href=""><img src="src/assets/megas.png" alt=""></a>
          </div>
          <div class="flex column">
            <h6>Информация</h6>
            <ul class="q-mt-sm">
              <li><router-link to="about" class="text-black" style="font-weight: normal" href="">О компании</router-link></li>
              <li><router-link to="" class="text-black" style="font-weight: normal" href="">Новости</router-link></li>
              <li><router-link to="documents" class="text-black" style="font-weight: normal" href="">Документы</router-link></li>
            </ul>
          </div>

          <div>
            <h6>Услуги</h6>
            <ul class="q-mt-sm">
              <li><router-link to="" class="text-black" style="font-weight: normal" href="">Генподряд</router-link></li>
              <li><router-link to="" class="text-black" style="font-weight: normal" href="">Стена в грунте</router-link></li>
              <li><router-link to="" class="text-black" style="font-weight: normal" href="">Монолитное строительство</router-link></li>
              <li><router-link to="" class="text-black" style="font-weight: normal" href="">Наши объекты</router-link></li>
            </ul>
          </div>

          <div>
            <b>для Москвы и области</b>
            <div class="row q-col-gutter-sm">
              <div class="flex items-center">
              <q-icon size="35px" class="las la-phone"/>
              <h5 style="margin: 0; padding: 0">+7 (495)795-93-39</h5>
              </div>
            </div>
          </div>

        </q-toolbar-title>
      </q-toolbar>
    </q-footer>

  </q-layout>
</template>

<script setup>
</script>


<script>
import { ref } from 'vue'





export default {
  setup () {
    return {
      slide: ref(1)
    }
  }
}


</script>
