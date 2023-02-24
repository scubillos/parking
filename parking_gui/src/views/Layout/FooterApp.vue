<template>
  <footer class="footer w-100">
    <div class="w-100 clearfix">
      <span class="text-sm-left d-md-inline-block text-center">Copyright © 2023 ArchiPlus.</span>
      <span class="float-sm-right mt-sm-0 float-none mt-1 text-center">
        <a href="https://tiu.edu.iq/" class="text-dark" target="_blank">Pontificia Universidad Javeriana</a>
      </span>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer"
}
</script>

<style scoped>
  .footer {
    background: #fff;
    padding: 20px 30px;
    border-top: 1px solid rgba(0,0,0,0.04);
    font-size: calc(0.875rem - 0.05rem);
    -moz-transition: all 0.25s ease;
    -o-transition: all 0.25s ease;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    position: fixed;
    bottom: 0;
  }
</style>