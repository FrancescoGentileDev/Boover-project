<template>
  <div data-theme="light">
    <NavbarComponent />
    <router-view class="pt-[8.75rem]"></router-view>
    <user-card-component />
    <home-hero-section />
    <footer-section />
  </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
import UserCardComponent from "../components/UserCardComponent.vue";
import FooterSection from "../sections/FooterSection.vue";
import HomeHeroSection from "../sections/HomeHeroSection.vue";
export default {
  components: {
    NavbarComponent,
    FooterSection,
    HomeHeroSection,
    UserCardComponent,
  },
};
</script>

<style>
</style>
