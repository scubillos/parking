<script setup lang="ts">
import { RouterView } from 'vue-router'
import FooterApp from "@/views/Layout/FooterApp.vue";
import HeaderApp from "@/views/Layout/HeaderApp.vue";

</script>

<template>
  <HeaderApp />
  <RouterView></RouterView>
  <FooterApp />
</template>