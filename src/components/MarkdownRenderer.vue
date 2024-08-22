<template>
    <div v-html="markdown.render(source)" />
</template>

<script setup lang="ts">
import MarkdownIt from "markdown-it";
import markdownItClass from "markdown-it-class";

const markdown = new MarkdownIt()
    .use(markdownItClass, {
        h4: ['q-mt-lg', 'q-mb-lg'],
        ul: ['q-mt-lg'],
        ol: ['q-mt-sm', 'q-mb-sm'],
        li: ['disc'],
        hr: ['q-mt-lg', 'q-mb-lg'],
    });

defineProps({
    source: {
        type: String,
        default: ""
    }
});
</script>