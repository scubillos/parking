<template>
  <!-- Copy this code to have a working example -->
  <MDBFooter
    bg="primary"
    :text="['white', 'center', 'lg-start']"
    class="fixed-bottom"
  >
    <div
      class="text-center p-3"
      style="background-color: rgba(0, 0, 0, 0.2)"
    >
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/"
      >ArchiPlus.com</a
      >
    </div>
    <!-- Copyright -->
  </MDBFooter>
  <!--/ Copy this code to have a working example -->
</template>

<script setup lang="ts">
  import { MDBFooter } from 'mdb-vue-ui-kit';
</script>

<style scoped>

</style>
