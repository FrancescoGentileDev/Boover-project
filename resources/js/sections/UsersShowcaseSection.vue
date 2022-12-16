<template>
    <div class="wrapper pt-24 pb-24 z-10">
        <div class="w-11/12 m-auto p-6">
            <h1 class="text-5xl primary">
                Get inspired with projects made by our freelancers
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
                <div class="w-full max-w-md px-8 py-4 mt-16 rounded-lg">
                    <div class="flex justify-center -mt-16">
                        <div class="avatar online">
                            <div class="w-36 rounded-full">
                                <img
                                    src="https://thispersondoesnotexist.com/image"
                                />
                            </div>
                        </div>
                    </div>

                    <h2
                        class="mt-2 text-lg font-semibold text-gray-800 dark:text-white text-center"
                    >
                        {{ user.name }}
                    </h2>

                    <p
                        class="mt-2 text-gray-600 dark:text-gray-200 text-ellipsis text-center"
                    >
                        {{ user.presentation }}
                    </p>

                    <div class="flex justify-end mt-4">
                        <a
                            href="#"
                            class="text-xl font-medium text-blue-600 dark:text-blue-300"
                            tabindex="0"
                            role="link"
                            >John Doe</a
                        >
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
                .get("/api/users")
                .then((response) => {
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
