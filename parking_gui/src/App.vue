<template>
  <MDBContainer>
    <Header />
    <router-view />
  </MDBContainer>
</template>

<script setup lang="ts">
import { MDBContainer } from "mdb-vue-ui-kit";
import Header from "./components/Layout/Header.vue";
</script>

<style scoped>
#app {
  font-family: Roboto, Helvetica, Arial, sans-serif;
}
</style>
