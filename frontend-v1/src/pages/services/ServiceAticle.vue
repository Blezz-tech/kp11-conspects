<script setup>
import MarkdownRenderer from 'src/components/MarkdownRenderer.vue';

import { articles } from 'src/lib/data';

function fakeFetch(id) {
  return articles.filter(item => item.id == id)[0];
}
</script>



<script>
import SideBar from 'src/components/SideBar.vue';

export default {
  components: { SideBar },
}
</script>

<template>
  <div class="narrow-block flex col-12 row items-start" style="margin-left: auto;">
    <div class="flex column col-7">
      <MarkdownRenderer :source="fakeFetch(Number($route.params.id)).text" />
    </div>
    <SideBar>
    </SideBar>
  </div>
</template>
