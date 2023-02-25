<template>
  <header>
    <!-- Navbar -->
    <MDBNavbar expand="lg" bg="light" position="sticky">
      <MDBNavbarToggler target="#navbarExample01"></MDBNavbarToggler>
      <MDBNavbarNav collapse="navbarExample01" class="mb-2 mb-lg-0" >
        <template v-for="header in headerOptions">
          <MDBNavbarItem :to="header.url">
            {{ header.text }}
          </MDBNavbarItem>
        </template>
      </MDBNavbarNav>
    </MDBNavbar>
    <!-- Navbar -->
  </header>
</template>

<script setup lang="ts">
import {
  MDBNavbar,
  MDBNavbarToggler,
  MDBNavbarNav,
  MDBNavbarItem,
} from 'mdb-vue-ui-kit';
import {ref} from "vue";

const headerOptions = ref([
  {
    key: 'home',
    url: '/',
    text: 'Reservaciones',
    dropdown: false,
  },
  {
    key: 'profile',
    url: '/in-dev',
    text: 'Perfil',
    dropdown: false,
  },
  {
    key: 'help',
    url: '/in-dev',
    text: 'Ayuda',
    dropdown: false,
  },
  {
    key: 'logout',
    url: '/in-dev',
    text: 'Cerrar sesión',
    dropdown: false,
  },
]);

</script>

<style scoped>

</style>
