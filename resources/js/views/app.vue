<template>
  <div data-theme="light" class="relative">
    <NavbarComponent ref="navbar"/>
    <router-view ref="content" class="min-h-[100vh]"></router-view>
    <footer-section class="bottom-0"/>
  </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
import FooterSection from "../sections/FooterSection.vue";
import HomeHeroSection from "../sections/HomeHeroSection.vue";
export default {
  components: { NavbarComponent, FooterSection },
  mounted() {
    setTimeout(() => {
      this.$refs.content.$el.style.paddingTop = this.$refs.navbar.$el.offsetHeight + 'px';
    }, 1000)
    window.addEventListener('resize', () => {
      this.$refs.content.$el.style.paddingTop = this.$refs.navbar.$el.offsetHeight + 'px';
    })
  }
};
</script>

<style>
</style>
