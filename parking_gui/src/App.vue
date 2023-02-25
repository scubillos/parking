<template>
  <MDBContainer fluid>
    <Header style="margin-bottom: 1em;"/>
    <router-view />
    <Footer />
  </MDBContainer>
</template>

<script setup lang="ts">
import { MDBContainer } from "mdb-vue-ui-kit";
import Header from "./components/Layout/Header.vue";
import Footer from "./components/Layout/Footer.vue";
</script>

<style scoped>
#app {
  font-family: Roboto, Helvetica, Arial, sans-serif;
}
</style>
