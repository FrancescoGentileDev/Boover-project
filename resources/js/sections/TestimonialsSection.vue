<template>
    <div class="wrapper pt-24 pb-24 bg-base-100">
        <carousel :per-page="1" :loop="true" class="w-11/12 m-auto p-6">
            <slide v-for="(review, index) in reviews.slice(0, 3)" :key="index">
                <!--  // -->
                <div
                    class="flex m-auto gap-9 flex-col md:flex-row justify-between"
                >
                    <!-- // -->
                    <div
                        class="aspect-[4/2] md:w-2/4 w-full bg-slate-400 rounded-md"
                    >
                        <img
                            class="w-full h-full object-cover rounded-lg"
                            :src="pics[index]"
                        />
                    </div>
                    <!--  // -->
                    <div
                        class="md:w-2/4 w-full flex flex-col justify-center gap-2"
                    >
                        <div class="flex gap-3">
                            <h4 class="flex flex-col-reverse text-xl">
                                {{ review.nickname }}
                            </h4>
                            <img :src="logos[index]" />
                        </div>

                        <q class="text-3xl font-bold">
                            {{ review.description }}
                        </q>
                    </div>
                    <!--  // -->
                </div>
                <!--  // -->
            </slide>
        </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
import Axios from "axios";
export default {
    name: "TestimonialsSection",
    //
    data() {
        return {
            reviews: "",
            isError: false,
            pics: [
                "https://images.pexels.com/photos/5407215/pexels-photo-5407215.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                "https://images.pexels.com/photos/3760532/pexels-photo-3760532.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
                "https://images.pexels.com/photos/1181715/pexels-photo-1181715.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1",
            ],
            logos: [
                "https://img.logoipsum.com/213.svg",
                "https://img.logoipsum.com/265.svg",
                "https://img.logoipsum.com/259.svg",
            ],
        };
    },
    //
    components: { Carousel, Slide },
    //
    methods: {
        //
        getReviewsData() {
            axios
                .get("/api/reviews/1")
                .then((response) => {
                    this.reviews = response.data.data;
                    //console.log(this.reviews[0].data[0].description);
                    console.log(this.reviews);
                })
                .catch((error) => {
                    if (error) {
                        /* console.log(error); */
                        this.isError = true;
                    }
                });
        },
    },
    //
    mounted() {
        this.getReviewsData();
    },
};
</script>

<style></style>
