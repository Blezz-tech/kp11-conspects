<script setup>

</script>

<script>
import { ref } from 'vue'
import SideBar from 'src/components/panels/SideBar.vue';
import MapPanel from 'src/components/panels/MapPanel.vue';


export default {
  components: { SideBar, MapPanel },
  setup() {
    return {
      slide: ref(1)
    }
  }
}
</script>

<template>
  <div class="narrow-block flex col-12 row items-start" style="margin-left: auto;">
    <div class="flex column col-7">
      <div>
        <h3>О компании</h3>
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

          Именно высокая квалификация персонала нашей компании гарантирует успешное решение инженерно-технических и
          управленческих задач любого уровня сложности.</p>
      </div>
    </div>
    <SideBar>
    </SideBar>
  </div>
  <h3 class="q-mt-lg q-mb-lg">Наши работы</h3>
  <div class="q-py-lg row q-col-gutter-md">
    <div class="q-pa-sm col-8" style="background-color: white; height: fit-content;">
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
    </div>


    <div class="col-4">
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
  </div>

  <MapPanel />
</template>
