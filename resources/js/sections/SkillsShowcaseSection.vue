<template>
  <div class="wrapper pt-24 pb-24 z-10">
    <div class="w-11/12 m-auto p-6">
      <h1 class="text-5xl primary">I servizi più popolari</h1>
    </div>
    <!--  // -->

    <div v-if="isError" class="alert alert-error shadow-lg">
      <div>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="stroke-current flex-shrink-0 h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
        <span>Error! something went wrong</span>
      </div>
    </div>

    <carousel
      v-else
      :isTouch="true"
      class="w-11/12 m-auto"
      :navigation-enabled="false"
      navigationNextLabel=' <div class="btn btn-circle">❯</div>'
      navigationPrevLabel='  <div class="btn btn-circle">❮</div>'
      :per-page="1"
      :perPageCustom="[
        [640, 2],
        [768, 3],
        [1024, 4],
        [1280, 5],
      ]"
    >
      <!-- slide-->
      <slide
        v-for="(skill, index) in skills.slice(0, 20)"
        :key="index"
        class="relative p-6 cursor-grab"
      >
        <router-link :to="'' + skill.route">
          <div
            :style="{ backgroundImage: 'url(' + skill.thumb + ')' }"
            class="h-96 rounded-md bg-cover relative"
          >
            <!-- overlay -->
            <div
              class="
                absolute
                top-0
                right-0
                w-full
                h-full
                rounded-md
                bg-gradient-to-t
                from-black
                via-black
                to-black
                opacity-50
              "
            ></div>
            <!-- overlay -->
          </div>

          <div class="absolute top-0 right-0 w-full h-full p-6">
            <div class="p-4">
              <h3 class="text-white text-sm">POPULAR</h3>
              <h1 class="text-xl text-white">
                {{ skill.name }}
              </h1>
            </div>
          </div>
        </router-link>
      </slide>
    </carousel>

    <!--  // -->
  </div>
</template>

<script>
import axios from "axios";
import { Carousel, Slide } from "vue-carousel";
import categoryThumb from "../../assets/categoryThumb.json";
import skillCarouselLinks from "../../assets/skillCarouselLinks.json";

export default {
  name: "SkillsShowcaseSection",
  data() {
    return {
      skills: [],
      isError: false,
      thumbs: categoryThumb,
      routes: skillCarouselLinks,
      manualNavigation: 1,
    };
  },
  components: {
    Carousel,
    Slide,
  },
  //
  methods: {
    getSkillsData() {
      //   this.thumbs.forEach((element) => {
      //     this.skills.thumb.push(element);
      //   });

      axios
        .get("/api/skills")
        .then((response) => {
          console.log("skills", response.data);
          response.data.forEach((element) => {
            let skill = {
              name: "",
              thumb: "",
              route: "",
            };
            skill.name = element.name;
            this.skills.push(skill);
          });
          this.thumbs.forEach((element, index) => {
            this.skills[index].thumb = element;
          });
          this.routes.forEach((element, index) => {
            this.skills[index].route = element;
          });
          console.log(this.skills);
        })
        .catch((error) => {
          if (error) {
            /* console.log(error); */
            this.isError = true;
          }
        });
    },
    //
  },
  mounted() {
    this.getSkillsData();
  },
};
</script>

<style scoped lang="scss"></style>
