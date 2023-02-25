<template>
  <header>
    <!-- Navbar -->
    <MDBNavbar expand="lg" light bg="white" container>
      <MDBNavbarToggler target="#navbarExample01"></MDBNavbarToggler>
      <MDBNavbarNav collapse="navbarExample01" class="mb-2 mb-lg-0">
        <template v-for="header in headerOptions" >
          <MDBNavbarItem class="dropdown" v-model="header.dropdown" :to="header.url !== '#' ? header.url : '#'">
            <MDBDropdownToggle @click="header.dropdown = !header.dropdown">
              {{ header.text }}
            </MDBDropdownToggle>
            <MDBDropdownMenu :aria-labelledby="'dropdownMenu' + header.key">
              <MDBDropdownItem href="#">Action</MDBDropdownItem>
              <MDBDropdownItem href="#">Another Action</MDBDropdownItem>
              <MDBDropdownItem href="#">Something else here</MDBDropdownItem>
            </MDBDropdownMenu>
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
  MDBDropdownMenu,
  MDBDropdownItem
} from 'mdb-vue-ui-kit';
import {ref} from "vue";

const headerOptions = ref([
  {
    key: 'home',
    url: '#',
    text: 'Inicio',
    dropdown: false,
  },
  {
    key: 'profile',
    url: '#',
    text: 'Perfil',
    dropdown: false,
  },
  {
    key: 'felp',
    url: '#',
    text: 'Ayuda',
    dropdown: false,
  },
  {
    key: 'logout',
    url: '#',
    text: 'Cerrar sesión',
    dropdown: false,
  },
]);

</script>

<style scoped>

</style>
