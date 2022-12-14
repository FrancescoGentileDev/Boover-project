<template>
    <div class="wrapper pt-24 pb-24 z-10">
        <div class="w-11/12 m-auto p-6">
            <h1 class="text-5xl primary">Popular professional services</h1>
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
            class="w-11/12 m-auto"
            :navigation-enabled="false"
            navigationNextLabel='  <div class="btn btn-circle">❯</div>'
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
                :key="skill + index"
                class="relative p-6"
            >
                <div
                    class="h-96 rounded-md bg-[url('https://fiverr-res.cloudinary.com/q_auto,f_auto,w_550,dpr_1.0/v1/attachments/generic_asset/asset/055f758c1f5b3a1ab38c047dce553860-1598561741678/logo-design-2x.png')] bg-cover"
                ></div>

                <div class="absolute top-0 right-0 w-full h-full p-6">
                    <div class="p-4">
                        <h3 class="text-white text-sm">POPULAR</h3>
                        <h1 class="text-xl text-white">
                            {{ skill.name }}
                        </h1>
                    </div>
                </div>

                <!-- overlay -->
                <!--   <div
                    class="absolute top-0 right-0 bg-slate-900 opacity-20 w-full h-full rounded-md"
                ></div> -->
                <!-- overlay -->
            </slide>
        </carousel>
        <!--  // -->
    </div>
</template>

<script>
import axios from "axios";
import { Carousel, Slide } from "vue-carousel";

export default {
    name: "SkillsShowcaseSection",
    data() {
        return {
            viewportWidth: 0,
            numberOfCards: "",
            skills: [],
            isError: false,
        };
    },
    components: {
        Carousel,
        Slide,
    },
    //
    methods: {
        getSkillsData() {
            axios
                .get("/api/skills")
                .then((response) => {
                    console.log(response.data);

                    this.skills.push(...response.data);
                })
                .catch((error) => {
                    if (error) {
                        console.log(error);
                        this.isError = true;
                    }
                });
        },
    },
    mounted() {
        this.getSkillsData();
    },
};
</script>

<style scoped lang="scss"></style>
