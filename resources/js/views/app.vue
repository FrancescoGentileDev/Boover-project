<template>
  <div>
    <div class="loading" v-if="loading">
      <loader-component />
    </div>
    <div v-else data-theme="light" class="relative">
      <NavbarComponent ref="navbar" :categories="categories" />
      <div ref="content" class="min-h-[100vh]" style="padding-top: 0px">
        <router-view @search="search" :categories="categories"></router-view>
      </div>
      <footer-section class="bottom-0" />
    </div>
  </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
import FooterSection from "../sections/FooterSection.vue";
import UserCardComponent from "../components/UserCardComponent.vue";
import LoaderComponent from '../components/loaderComponent.vue';
export default {
  components: { NavbarComponent, FooterSection, UserCardComponent, LoaderComponent },
  data() {
    return {
        categories: [],
      loading: true,
    };
  },
  created() {
    axios.get("/api/category").then((response) => {
      this.categories = response.data;
    });
  },
  async mounted() {


  },

  methods: {
    paddingHandling(bool, time = 100) {
      if (bool) {
        this.$refs.content.style.paddingTop =
          this.$refs.navbar.$el.offsetHeight + "px";
        setTimeout(() => {
          this.$refs.content.style.paddingTop =
            this.$refs.navbar.$el.offsetHeight + "px";
        }, time);
        window.addEventListener("resize", () => {
          this.$refs.content.style.paddingTop =
            this.$refs.navbar.$el.offsetHeight + "px";
        });
      } else {
        this.$refs.content.style.paddingTop = "0px";
        window.removeEventListener("resize", () => {
          this.$refs.content.style.paddingTop = "0px";
        });
      }
    },

    search(search) {
      this.$refs.navbar.searchInput = search;
    },
  },
};
</script>

<style>
html,
body {
  overflow-x: hidden;
}
</style>
