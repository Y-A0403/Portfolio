<script setup>
import { Link } from '@inertiajs/inertia-vue3';

</script>

<template>
  Inertiaテストです。<br>
  <!-- "/"は8085portに戻る -->
  <a href="/">aタグ経由</a><br>
  <Link href="/">Link経由</Link>


</template>