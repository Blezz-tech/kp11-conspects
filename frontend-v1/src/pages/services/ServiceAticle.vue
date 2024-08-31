<script setup>
import MarkdownRenderer from 'src/components/MarkdownRenderer.vue';

import { articles } from 'src/lib/data';

function fakeFetch(id) {
  return articles.filter(item => item.id == id)[0];
}


</script>

<template>
  <MarkdownRenderer
    :source="fakeFetch(Number($route.params.id)).text"
  />
</template>
