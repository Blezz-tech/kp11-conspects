<script setup>
import MarkdownRenderer from 'src/components/utils/MarkdownRenderer.vue';

import { articles } from 'src/fake_database/data';

function fakeFetch(id) {
  return articles.filter(item => item.id == id)[0];
}
</script>



<script>

</script>

<template>
  <MarkdownRenderer :source="fakeFetch(Number($route.params.id)).text" />
</template>
