<template>
  <div data-theme="dark">
    <NavbarComponent />
    <router-view class="pt-[8.75rem]"></router-view>
    <footer-section />
    test
  </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
import FooterSection from "../sections/FooterSection.vue";
export default {
  components: { NavbarComponent, FooterSection },
};
</script>

<style>
</style>
