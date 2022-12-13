<template>
  <div>
    <home-hero-section />
    <router-view></router-view>
  </div>
</template>

<script>
import HomeHeroSection from "../sections/HomeHeroSection.vue";
import homeView from "./homeView.vue";
export default {
  components: { homeView, HomeHeroSection },
};
</script>

<style></style>
