<template>


  <div class="row col-12">
    <div class="narrow-block flex col-12 row items-center" style="margin-left: auto;">
      <div class="flex column">
        <div>
          <h3 class="q-mt-xl">О компании</h3>
          <hr class="q-mt-lg">
        </div>
        <div>
          <h4 class="q-mt-xl q-mb-xl">Наша компания</h4>
          <p>ООО «МегаСтрой» - известная и активно развивающаяся компания, специализирующаяся в области генподрядных
            услуг, строительно-монтажных работ, капитального ремонта, реконструкции и реставрации зданий и сооружений,
            земляных работ и услуг по устройству нулевых циклов. «МегаСтрой» - это сплоченный коллектив
            профессионалов.</p>
        </div>
        <div>
          <h4 class="q-mt-xl q-mb-xl">Наш коллектив</h4>
          <p>Основу компании составляют высококвалифицированные специалисты - монтажники, сварщики, механизаторы,
            механики, которые ежегодно повышают квалификацию в учебных центрах, стажируются на предприятиях,
            производящих новую технику.

            <br>Именно высокая квалификация персонала нашей компании гарантирует успешное решение инженерно-технических и
            управленческих задач любого уровня сложности.</p>
        </div>
      </div>
    </div>
  </div>


  <h3 class="q-mt-lg q-mb-lg">Наши работы</h3>
  <div class="q-py-lg row q-col-gutter-md">
    <div class="q-pa-sm col-8" style="background-color: white">
      <q-carousel
        swipeable
        animated
        arrows
        v-model="slide"
        v-model:fullscreen="fullscreen"
        infinite
      >
        <q-carousel-slide :name="1" img-src="https://cdn.quasar.dev/img/mountains.jpg"/>
        <q-carousel-slide :name="2" img-src="https://cdn.quasar.dev/img/parallax1.jpg"/>
        <q-carousel-slide :name="3" img-src="https://cdn.quasar.dev/img/parallax2.jpg"/>
        <q-carousel-slide :name="4" img-src="https://cdn.quasar.dev/img/quasar.jpg"/>

        <template v-slot:control>
          <q-carousel-control
            position="bottom-right"
            :offset="[18, 18]"
          >
            <q-btn no-caps class="btn" push dense @click="fullscreen = !fullscreen">Подробнее</q-btn>
          </q-carousel-control>
        </template>
      </q-carousel>
    </div>
  </div>

  <!--MAP-->

  <iframe class="q-mt-xl narrow-block"
          src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;source=constructor-api&amp;um=constructor%3Afa9d46d1ec17792480637a31d922323cfbdbc6c5a612341893dbd80e20fd80db"
          frameborder="0" allowfullscreen="true" width="1280px" height="720px" style="display: block;"></iframe>

</template>

<script setup>
</script>

<script>
import { ref } from 'vue';

console.log('message')

export default {
  setup() {
    const slide = ref(1);
    return { slide }; // Возвращаем слайд для использования в шаблоне
  },
};
</script>
