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
  <MarkdownRenderer :source="fakeFetch(Number($route.params.id)).text" />
</template>
