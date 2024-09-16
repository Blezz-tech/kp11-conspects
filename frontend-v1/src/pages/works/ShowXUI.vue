<script setup>
import { works } from 'src/fake_database/data';

function fakeFetch(id) {
  return works.filter(item => item.id == id)[0];
}

const work = fakeFetch(Number($route.params.id));

</script>

<template>

  <h3 class="q-mt-xl">Жилой дом со встроенными нежилыми помещениями и подземной автостоянкой 2014г.</h3>
  <h4 class="q-mt-sm"> Адрес: г. Москва, САО, ул. 1-я Квесисская, вл. 9-13, стр. 1,2</h4>
  <hr class="q-mt-lg q-mb-lg">
 <div>
  <p>Наша компания выполнила комплекс строительно- монтажных работ по устройству шпунтового ограждения котлована и устройству «стены в грунте».
    Заказчик: ООО «ГД Мастер»</p>
  <b> Выполнен комплекс работ:</b>
<ul>
  <li class="disc">шпунтовое ограждение котлована-924 м/пог,</li>
  <li class="disc">устройство "стены в грунте" 1 698 м3,</li>
  <li class="disc">разработка грунта котлована 25 000м3,</li>
  <li class="disc">выполнение распорной системы котлована</li>
</ul>



<div class="narrow-block flex col-12 row items-center">
   <div class="col-7">
     <div class="items-center justify-between flex q-pb-md">

       <h4>Новости</h4>
       <a class="text-dark" href="">Все события</a>

     </div>

     <div class="flex no-wrap q-gutter-sm q-pb-md">
       <div class="date" style="height: max-content">
         <div style="width: 50px; height: 50px">
           <h5 class="text-white">20</h5>
           Март
         </div>
       </div>
       <div class="column">
         <h5 style="line-height: initial">
           <a href="">
             Выставка «Строительная Техника и Технологии» 2016</a>
         </h5>
         <div class="text-body1">СТТ – выставка строительной техники и оборудования №1 в России и странах СНГ.</div>
       </div>
     </div>

     <div class="flex no-wrap q-gutter-sm q-pb-md">
       <div class="date" style="height: max-content">
         <div style="width: 50px; height: 50px">
           <h5 class="text-white">20</h5>
           Май
         </div>
       </div>
       <div class="column">
         <h5 style="line-height: initial">
           <a href="">
             Международной конференции «Энергоинтеграция-2013» </a>
         </h5>
         <div class="text-body1">Строительная компания ООО «МегаСтрой» приняла участие в III Международной конференции
           «Энергоинтеграция-2013» </div>
       </div>
     </div>



    </div>
     <div class="bg-white rounded-borders shadow-24" style="margin-left: auto;">
       <h4 class="q-ma-xl">Все наши услуги</h4>
       <ul class="q-ma-xl">
         <li><a href="">Генеральный подряд</a></li>
         <li><a href="">Стена в грунте</a></li>
         <li><a href="">Монолитное строительство</a></li>
         <li><a href="">Разработка котлованов</a></li>
         <li><a href="">Шпунтовое ограждение</a></li>
         <li><a href="">Буроинъекционные сваи</a></li>
         <li><a href="">Буронабивные сваи</a></li>
         <li><a href="">Сваи РИТ, ЭРСТ, Микродур</a></li>
         <li><a href="">Укрепление грунтов</a></li>
         <li><a href="">Цементация</a></li>
         <li><a href="">Усиление фундамента</a></li>
         <li><a href="">Анкерные системы</a></li>
         <li><a href="">Гидроизоляция</a></li>
       </ul>
     </div>


   </div>
 </div>

<div>
  <b>Фотографии проведения работ:</b>

  <div class="narrow-block">
    <q-tabs inline-label class="q-mt-xl q-mb-xl"
            outside-arrows>
      <q-tab class="rounded-borders q-mr-md" style="gap: 5%">
        <router-link to="Izmeni" style="text-decoration: none;">
          <img style="width: 220px; height: 140px" src="src/assets/kvesisskaya_01.jpg" alt="">
        </router-link>
      </q-tab>

      <q-tab class="rounded-borders q-mr-md" style="gap: 5%">
        <router-link to="Izmeni" style="text-decoration: none;">
          <img style="width: 220px; height: 140px" src="src/assets/kvesisskaya_01.jpg" alt="">
        </router-link>
      </q-tab>

      <q-tab class="rounded-borders q-mr-md" style="gap: 5%">
        <router-link to="Izmeni" style="text-decoration: none;">
          <img style="width: 220px; height: 140px" src="src/assets/kvesisskaya_01.jpg" alt="">
        </router-link>
      </q-tab>

      <q-tab class="rounded-borders q-mr-md" style="gap: 5%">
        <router-link to="Izmeni" style="text-decoration: none;">
          <img style="width: 220px; height: 140px" src="src/assets/kvesisskaya_01.jpg" alt="">
        </router-link>
      </q-tab>

      <q-tab class="rounded-borders q-mr-md" style="gap: 5%">
        <router-link to="Izmeni" style="text-decoration: none;">
          <img style="width: 220px; height: 140px" src="src/assets/kvesisskaya_01.jpg" alt="">
        </router-link>
      </q-tab>

      <q-tab class="rounded-borders q-mr-md" style="gap: 5%">
        <router-link to="Izmeni" style="text-decoration: none;">
          <img style="width: 220px; height: 140px" src="src/assets/kvesisskaya_01.jpg" alt="">
        </router-link>
      </q-tab>

    </q-tabs>
  </div>
</div>

</template>

<style scoped>

</style>

<script>
import { ref } from 'vue'

export default {
  setup () {
    return {
      slide: ref(1),
      fullscreen: ref(false)
    }
  }
}
</script>
