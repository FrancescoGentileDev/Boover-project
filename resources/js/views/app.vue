<template>
  <div data-theme="light" class="relative">
    <NavbarComponent ref="navbar"/>
    <div ref="content" class="min-h-[100vh]" style="padding-top: 0px">
    <router-view></router-view>
    </div>
    <footer-section class="bottom-0"/>
  </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
import FooterSection from "../sections/FooterSection.vue";
import UserCardComponent from "../components/UserCardComponent.vue";
export default {
  components: { NavbarComponent, FooterSection, UserCardComponent },
  mounted() {
   this.$refs.content.style.paddingTop = this.$refs.navbar.$el.offsetHeight + "px";
   setTimeout(() => {
    this.$refs.content.style.paddingTop= this.$refs.navbar.$el.offsetHeight + "px";
   }, 1000);
   window.addEventListener("resize", () => {
    this.$refs.content.style.paddingTop = this.$refs.navbar.$el.offsetHeight + "px";
   });

},

};
</script>

<style>
</style>
