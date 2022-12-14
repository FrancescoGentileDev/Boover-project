<template>
  <div data-theme="dark">
    <NavbarComponent />
    <router-view class="pt-[8.75rem]"></router-view>
    <home-hero-section />
    <footer-section />
  </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
import FooterSection from "../sections/FooterSection.vue";
import HomeHeroSection from "../sections/HomeHeroSection.vue";
export default {
  components: { NavbarComponent, FooterSection, HomeHeroSection },
};
</script>

<style>
</style>
