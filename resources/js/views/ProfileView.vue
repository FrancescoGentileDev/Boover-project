<template>
    <!-- // -->
    <div class="bg-base-100 p7-8">
        <div class="text-sm breadcrumbs w-11/12 m-auto px-5">
            <ul>
                <li>
                    <router-link to="/">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                            />
                        </svg>

                        <h2 class="pl-1">Home</h2>
                    </router-link>
                </li>
                <li>
                    <router-link to="/">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                            />
                        </svg>

                        <h2 class="pl-1">Search</h2>
                    </router-link>
                </li>
                <li>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>

                    <h2 class="pl-1">Profile</h2>
                </li>
            </ul>
        </div>

        <div class="w-11/12 m-auto lg:flex">
            <!-- CONTENT /////////////////////////////////////////////////////////////////////////////// -->
            <div class="w-full px-5 rounded-xl">
                <!-- profile container -->
                <div class="rounded-xl bg-base-100 overflow-hidden shadow-xl">
                    <!-- row coloured -->
                    <div
                        class="pt-8 h-fit bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 ..."
                    >
                        <div
                            class="avatar online translate-y-1/2 translate-x-8"
                        >
                            <div
                                class="w-32 rounded-full ring ring-white ring-offset-base-100 ring-offset-2"
                            >
                                <img
                                    :src="activeProfile.avatar"
                                    :alt="'Picture of ' + activeProfile.name"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- text -->
                    <div class="p-8">
                        <h1 class="font-bold text-3xl items-center mt-20">
                            {{ activeProfile.name }}
                            {{ activeProfile.lastname }}
                        </h1>

                        <!-- contact -->
                        <div class="flex gap-6 py-4 flex-wrap">
                            <div class="flex justify-center items-center gap-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-4 h-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"
                                    />
                                </svg>

                                <h3 class="text-3sm">
                                    {{ activeProfile.email }}
                                </h3>
                            </div>

                            <div class="flex justify-center items-center gap-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-4 h-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"
                                    />
                                </svg>

                                <h3 class="text-3sm">
                                    {{ activeProfile.phone }}
                                </h3>
                            </div>
                        </div>

                        <p class="py-4">
                            {{ activeProfile.detailed_description }}
                        </p>
                    </div>
                </div>

                <!-- skills container -->

                <div
                    class="rounded-xl bg-base-100 overflow-hidden shadow-xl p-8 my-4"
                >
                    <h1 class="font-bold text-2xl mb-5">My skills</h1>

                    <div class="flex gap-2 flex-wrap">
                        <div
                            class="badge badge-xl p-4"
                            v-for="(skill, index) in activeProfile.skills"
                            :key="index"
                        >
                            {{ skill.name }}
                        </div>
                    </div>
                </div>

                <!-- reviews container-->
                <div class="">
                    <h1 class="font-bold text-2xl px-5 pt-4">
                        Le mie recensioni
                    </h1>

                    <div
                        v-for="(review, index) in computedObj"
                        :key="index"
                        class="bg-gray-100 rounded-lg my-4 p-7"
                    >
                        <div class="flex items-center">
                            <div
                                v-for="(star, i) in turnVoteIntoStar(
                                    review.vote
                                )"
                                :key="i"
                            >
                                <i
                                    v-if="star === true"
                                    class="fa-solid fa-star text-yellow-400"
                                ></i>

                                <i
                                    v-else
                                    class="fa-solid fa-star text-gray-300"
                                ></i>
                            </div>

                            <h3 class="mx-2 text-sm">
                                <span v-if="review.vote > 1"
                                    >{{ review.vote }} stelle</span
                                >
                                <span v-else>{{ review.vote }} stella</span>
                            </h3>
                        </div>

                        <h1 class="mt-6 font-bold">{{ review.title }}</h1>

                        <p class="leading-loose text-gray-500 text-left">
                            {{ review.description }}
                        </p>

                        <div class="flex items-center mt-6">
                            <div>
                                <h1 class="font-semibold text-primary">
                                    {{ review.nickname }}
                                </h1>
                                <span class="text-sm text-gray-5000">
                                    Happy client
                                    <i class="fa-regular fa-face-smile"></i
                                ></span>
                            </div>
                        </div>
                    </div>

                    <div
                        v-if="!allReviewsAreShowed"
                        class="flex cursor-pointer opacity-50 hover:opacity-100"
                        @click="increaseReviewsNumber"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>

                        <h1>see more</h1>
                    </div>
                </div>
            </div>
            <!-- CONTENT END ///////////////////////////////////////////////////////////////////////////-->

            <!-- FORMS /////////////////////////////////////////////////////////////////////////////// -->
            <div class="w-full px-5 pt-10 lg:w-3/5 lg:pt-0">
                <div class="shadow-xl rounded-xl bg-base-200">
                    <div class="p-8 mx-auto rounded-lg">
                        <!-- swap form button -->
                        <div class="flex items-center justify-center mt-6">
                            <h3
                                class="w-full lg:w-1/3 pb-4 font-medium text-center capitalize border-b-2 opacity-40 cursor-pointer"
                                :class="{
                                    'border-blue-500 text-indigo-500  opacity-100':
                                        !isMessageActive,
                                }"
                                @click="changeFormGenre('review')"
                            >
                                recensione
                            </h3>

                            <h3
                                class="w-full lg:w-1/3 pb-4 font-medium text-center capitalize border-b-2 opacity-40 cursor-pointer"
                                :class="{
                                    'border-blue-500  text-indigo-500 opacity-100':
                                        isMessageActive,
                                }"
                                @click="changeFormGenre('message')"
                            >
                                messaggio
                            </h3>
                        </div>

                        <!-- message form -->
                        <form
                            v-if="formGenre == 'message'"
                            ref="formMessage"
                            class="mt-6"
                            @submit="submitMessage"
                        >
                            <h1 class="text-2xl font-bold py-4">
                                Lascia un messaggio
                            </h1>

                            <div class="flex-1">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Nome</label
                                >
                                <input
                                    type="text"
                                    required
                                    placeholder="John Doe"
                                    name="nickname"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>

                            <div class="flex-1 mt-6">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    required
                                    name="email"
                                    placeholder="johndoe@example.com"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>

                            <div class="flex-1 mt-6">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Telefono</label
                                >
                                <input
                                    type="tel"
                                    required
                                    placeholder="1234567890"
                                    name="phone"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>

                            <div class="flex-1 mt-14">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Oggetto</label
                                >
                                <input
                                    type="text"
                                    required
                                    placeholder="Oggetto del messaggio"
                                    name="title"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>

                            <div class="w-full mt-6">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Messaggio</label
                                >
                                <textarea
                                    name="content"
                                    required
                                    class="block w-full h-32 px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md md:h-48"
                                    placeholder="Scrivi qualcosa"
                                ></textarea>
                            </div>

                            <h1
                                v-if="isMessageSent"
                                class="text-center text-accent py-4"
                            >
                                Messaggio inviato!
                            </h1>
                            <button
                                v-else
                                class="w-full px-6 py-3 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                            >
                                Send
                            </button>
                        </form>

                        <!-- review form -->
                        <form
                            ref="formReview"
                            class="mt-6"
                            @submit="submitReview"
                            v-else
                        >
                            <h1 class="text-2xl font-bold py-4">
                                Lascia una recensione
                            </h1>

                            <div class="flex-1">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Nome</label
                                >
                                <input
                                    type="text"
                                    required
                                    placeholder="John Doe"
                                    name="nickname"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>

                            <div class="flex-1 mt-14">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Titolo</label
                                >
                                <input
                                    type="text"
                                    placeholder="Titolo della recensione"
                                    name="title"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>
                            <div class="flex-1 mt-14">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Voto</label
                                >
                                <input
                                    type="number"
                                    min="1"
                                    max="5"
                                    placeholder="Seleziona il numero di stelle"
                                    name="vote"
                                    class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md"
                                />
                            </div>

                            <div class="w-full mt-6">
                                <label
                                    class="block mb-2 text-sm text-base-content"
                                    >Recensione</label
                                >
                                <textarea
                                    name="description"
                                    class="block w-full h-32 px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md md:h-48"
                                    placeholder="Scrivi la tua recensione"
                                ></textarea>
                            </div>

                            <h1
                                v-if="isReviewSent"
                                class="text-center text-accent py-4"
                            >
                                Recensione inviata!
                            </h1>

                            <button
                                v-else
                                class="w-full px-6 py-3 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                            >
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- FORMS END /////////////////////////////////////////////////////////////////////////////// -->
        </div>
        <!-- correlatedUser -->
        <div class="bg-primary py-8 mt-16">
            <h1 class="font-bold text-2xl px-5 py-16 text-white text-center">
                Altri profili che potrebbero interessarti
            </h1>

            <div class="w-full m-auto">
                <carousel
                    :isTouch="true"
                    class="w-full"
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
                    <slide
                        v-for="(user, index) in correlatedUsers"
                        :key="index"
                        class="relative p-6"
                    >
                        <div class="flex flex-col justify-center items-center">
                            <router-link :to="'/profile/' + user.slug">
                                <div
                                    class="avatar hover:scale-105 transition-all"
                                >
                                    <div
                                        class="w-32 rounded-full ring ring-white ring-offset-base-100 ring-offset-2"
                                    >
                                        <img
                                            :src="user.avatar"
                                            :alt="'Picture of ' + user.name"
                                        />
                                    </div>
                                </div>
                            </router-link>
                            <div class="text-center py-6 font-bold text-white">
                                <h1>{{ user.name }}</h1>
                                <h1>{{ user.lastname }}</h1>
                            </div>
                        </div>
                    </slide>
                </carousel>
            </div>
        </div>
    </div>
    <!-- // -->
</template>

<script>
import axios from "axios";
import { Carousel, Slide } from "vue-carousel";

export default {
    data() {
        return {
            activeProfile: {},
            correlatedUsers: [],
            reviews: {},
            formGenre: "message",
            isMessageActive: true,
            navbarHeight: this.$parent.$children[0].$el.offsetHeight,
            starsStatus: [false, false, false, false, false], // determina quali stelle saranno piene e quali no nelle review
            limitReviews: 5,
            allReviewsAreShowed: false,
            isMessageSent: false,
            isReviewSent: false,
        };
    },
    components: {
        Carousel,
        Slide,
    },

    computed: {
        displaySkills() {
            if (!("skills" in this.activeProfile)) return ""; // Guard Statemente
            return this.activeProfile.skills
                .map((skill) => skill.name)
                .join(", "); // Map a new array and join to string
        },
        //
        computedObj() {
            return this.limitReviews
                ? this.reviews.slice(0, this.limitReviews)
                : this.object;
        },
    },
    //
    watch: {
        $route(to, from) {
            this.activeProfile = [];
            /* console.log(this.$route.params.slug); */
            this.getUserProfile(this.$route.params.slug);
            window.scrollTo(0, 0);
        },
    },

    methods: {
        submitMessage(event) {
            event.preventDefault();
            const form = this.$refs.formMessage;
            const formData = new FormData(form);
            let submitMessage = {
                user_id: this.activeProfile.user_id,
                nickname: formData.get("nickname"),
                email: formData.get("email"),
                phone: formData.get("phone"),
                title: formData.get("title"),
                content: formData.get("content"),
            };

            axios.post("/api/sendMessage", submitMessage).then((response) => {
                console.log("Debug - Message Sent", response);
                this.isMessageSent = true;
                form.reset();
            });
        },
        submitReview(event) {
            event.preventDefault();
            const form = this.$refs.formReview;
            const formData = new FormData(form);
            let submitMessage = {
                user_id: this.activeProfile.user_id,
                nickname: formData.get("nickname"),
                title: formData.get("title"),
                vote: formData.get("vote"),
                description: formData.get("description"),
            };

            axios.post("/api/review/send", submitMessage).then((response) => {
                console.log("Debug - Message Sent", response);
                this.isReviewSent = true;
                form.reset();
            });
        },

        getUserProfile(id) {
            axios.get("/api/users/" + id + "?slug=true").then((response) => {
                this.activeProfile = response.data;
                this.reviews = response.data.reviews;
                console.log("Debug - Current Active Profile", response.data);

                this.correlatedUsers = [];
                this.getUserCorrelated(this.activeProfile.skills[0].id);
            });
        },
        //
        getUserCorrelated(id) {
            axios.get(`/api/users/?skill=${id}`).then((response) => {
                let allCorrelatedUsers = response.data.data;

                allCorrelatedUsers.forEach((correlatedUser) => {
                    /* toglie il profilo dell'utente stesso dai suggeriti */
                    if (correlatedUser.user_id == this.activeProfile.user_id) {
                        console.log(
                            "doppione",
                            correlatedUser.user_id,
                            this.activeProfile.user_id
                        );
                    } else {
                        this.correlatedUsers.push(correlatedUser);
                    }
                });

                console.log(
                    "Debug - Current correlated users",
                    this.correlatedUsers
                );
            });
        },
        //
        changeFormGenre(genre) {
            //
            this.formGenre = genre;

            if (genre == "message") {
                this.isMessageActive = true;
                //
            } else {
                this.isMessageActive = false;
            }

            this.isMessageSent = false;
            this.isReviewSent = false;
        },
        //
        turnVoteIntoStar(vote) {
            this.starsStatus = [false, false, false, false, false];

            let numberOfCheckedStars = vote;

            for (let index = 0; index < numberOfCheckedStars; index++) {
                this.starsStatus[index] = true;
            }

            return this.starsStatus; // questo è un array che indica quante stelle sono piene(accese) e quante no
        },
        //
        increaseReviewsNumber() {
            if (this.limitReviews >= this.reviews.lenght) {
                console.log("stop incrementing");
                this.allReviewsAreShowed = true;
            } else {
                this.limitReviews += 5;
            }
        },
    },

    created() {
        /* corregge un bug sul carousel */
        setTimeout(() => {
            window.dispatchEvent(new Event("resize"));
        }, 1000);
        /* corregge un bug sul carousel */
        setTimeout(() => {
            window.dispatchEvent(new Event("resize"));
        }, 2000);
        /* corregge un bug sul carousel */
        setTimeout(() => {
            window.dispatchEvent(new Event("resize"));
        }, 3000);
    },
    mounted() {
        this.$parent.paddingHandling(true, 1000);
        this.getUserProfile(this.$route.params.slug);
        this.getUserCorrelated(this.activeProfile.skills[0].id);
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
    //
};
</script>

<style lang="scss" scoped>
.flow > * + * {
    margin-top: 1em;
}
</style>
