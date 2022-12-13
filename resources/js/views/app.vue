<template>
  <div>
    <footer-section />
    <router-view></router-view>
  </div>
</template>

<script>
import FooterSection from "../sections/FooterSection.vue";
import homeView from "./homeView.vue";
export default {
  components: { homeView, FooterSection },
};
</script>

<style></style>
