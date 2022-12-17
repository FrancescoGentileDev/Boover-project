<template>
    <div class="wrapper pt-24 pb-24 z-10 bg-primary">
        <div class="w-11/12 m-auto p-6">
            <h1 class="text-5xl primary text-center text-white">
                Get inspired with our top freelancers
            </h1>
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
            <!--   <div class="avatar online">
                <div class="w-24 rounded-full">
                    <img src="https://placeimg.com/192/192/people" />
                </div>
            </div> -->

            <!-- slide-->
            <slide
                v-for="(user, index) in users.slice(0, 20)"
                :key="user + index"
                class="relative p-6"
            >
                <div class="flex flex-col bg-base-200 p-10 rounded-xl">
                    <div class="avatar online m-auto">
                        <div class="w-24 mask mask-squircle">
                            <img :src="user.avatar" />
                        </div>
                    </div>
                    <h1 class="text-center py-3 font-semibold text-lg">
                        {{ user.name }}
                    </h1>
                    <h1 class="text-center py-6"></h1>

                    <div class="flex flex-wrap gap-2 justify-center">
                        <div class="badge badge-primary">musicista</div>
                        <div class="badge badge-primary">web designer</div>
                        <div class="badge badge-primary">neutral designer</div>
                        <div class="badge badge-primary">web designer</div>
                        <div class="badge badge-primary">neutral designer</div>
                    </div>
                </div>
            </slide>
        </carousel>

        <!--  // -->
    </div>
</template>

<script>
import axios from "axios";
import { Carousel, Slide } from "vue-carousel";

export default {
    name: "UsersShowcaseSection",
    data() {
        return {
            users: [],
            isError: false,
        };
    },
    components: {
        Carousel,
        Slide,
    },
    //
    methods: {
        getUsersData() {
            axios
                .get("/api/users/?page=3")
                .then((response) => {
                    /* console.log(response.data.data); */

                    response.data.data.forEach((element) => {
                        console.log(element);
                    });

                    console.log(response.data.data);

                    this.users.push(...response.data.data);
                })
                .catch((error) => {
                    if (error) {
                        /* console.log(error); */
                        this.isError = true;
                    }
                });
        },
    },
    mounted() {
        this.getUsersData();
    },
};
</script>

<style scoped lang="scss"></style>
