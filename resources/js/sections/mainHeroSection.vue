<template>
    <div class="background h-[70vh] relative">
        <carousel
            class="w-full h-full"
            :perPage="1"
            :navigationEnabled="false"
            :paginationEnabled="false"
            :autoplay="true"
            :autoplayTimeout="5000"
            :loop="true"
        >
            <slide v-for="(image, index) in slides" :key="index">
                <div
                    class="h-[70vh] w-full"
                    :style="{
                        backgroundImage: `url(${image.image})`,
                        backgroundSize: 'cover',
                        backgroundPosition: 'center',
                    }"
                ></div>
            </slide>
        </carousel>
        <div class="absolute left-24 top-1/2 -translate-y-1/2 w-1/2">
            <h1 class="text-4xl text-base-100 pb-3 font-bold">
                Cerca il Professionista o il Servizio
            </h1>
            <h1 class="text-4xl text-base-100 pb-5 font-bold">
                che fa per te
            </h1>
            <div
                class="searchMain relative flex rounded-lg bg-base-100 border border-base-200 shadow-md md:p-2"
            >
                <input
                    placeholder="Cerca un servizio o un professionista"
                    class="inputHero input input-ghost w-full p-4 rounded-lg"
                    type="text"
                    v-model="searchInput"
                    @keyup.enter="search"
                />
                <button
                    type="button"
                    title="start search"
                    class="ml-auto py-3 px-6 rounded-lg text-center text-base-100 transition bg-primary hover:bg-primary-focus"
                >
                    Cerca
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 mx-auto text-base-content md:hidden"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                        />
                    </svg>
                </button>
                <div
                    v-if="searchInput.length > 0 && inputFocus"
                    class="searchPanel absolute bottom-0 translate-y-full left-0 w-full bg-base-100 border rounded-lg border-base-300 shadow-md md:px-8 md:py-2"
                >
                    <div v-if="searchResultsServices.length" class="services">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        <span>Servizi</span>
                        <ul class="">
                            <li
                                class="p-1 hover:bg-base-300 rounded-xl"
                                v-for="(skill, index) in searchResultsServices"
                                :key="index"
                            >
                                <router-link
                                    class="ml-5"
                                    :to="'/skill/' + skill.slug"
                                    >{{ skill.name }}</router-link
                                >
                            </li>
                        </ul>
                    </div>

                    <div class="users pt-3">
                        <em class="fas fa-user"></em>
                        <span>Utenti</span>
                        <router-link
                            :to="'/search?search=' + searchInput"
                            class="block p-1 pl-5 bg-base-200 my-2 rounded-lg"
                        >
                            <em class="fa-solid fa-magnifying-glass"></em> Cerca
                            altri utenti contenenti "{{ searchInput }}"
                        </router-link>
                        <ul class="">
                            <li
                                class="p-1 pl-5 hover:bg-base-300 rounded-xl"
                                v-for="(user, index) in searchResultsUsers"
                                :key="index"
                            >
                                <router-link :to="'/profile/' + user.slug"
                                    >{{ user.name }}
                                    {{ user.lastname }}</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
    components: { Carousel, Slide },
    props: {
        categories: Array,
    },
    data() {
        return {
            inputFocus: false,
            searchInput: "",
            searchResults: [],
            slides: [
                {
                    id: 1,
                    title: "Slide 1",
                    image: "https://fiverr-res.cloudinary.com/image/upload/q_auto,f_auto/v1/attachments/generic_asset/asset/bb5958e41c91bb37f4afe2a318b71599-1599344049970/bg-hero-5-1792-x1.png",
                },
                {
                    id: 2,
                    title: "Slide 2",
                    image: "https://fiverr-res.cloudinary.com/image/upload/q_auto,f_auto/v1/attachments/generic_asset/asset/93085acc959671e9e9e77f3ca8147f82-1599427734108/bg-hero-4-1792-x1.png",
                },
                {
                    id: 3,
                    title: "Slide 3",
                    image: "https://fiverr-res.cloudinary.com/image/upload/q_auto,f_auto/v1/attachments/generic_asset/asset/d14871e2d118f46db2c18ad882619ea8-1599835783966/bg-hero-3-1792-x1.png",
                },
                {
                    id: 4,
                    title: "Slide 4",
                    image: "https://fiverr-res.cloudinary.com/image/upload/q_auto,f_auto/v1/attachments/generic_asset/asset/bb5958e41c91bb37f4afe2a318b71599-1599344049983/bg-hero-1-1792-x1.png",
                },
            ],
        };
    },
    mounted() {
        window.addEventListener("click", (e)  => {
            if (document.querySelector(".searchMain") == e.target.parentNode ) {
                this.inputFocus = true;

            } else {
                this.inputFocus = false;
            }
        });
    },
    methods: {
        search() {
            this.$router.push({
                name: "search",
                to: "/search",
                query: { search: this.searchInput },
            });
        },
        boldInput() {
            document.querySelectorAll(".searchPanel ul li a").forEach((el) => {
                let searchInput = this.searchInput.toLowerCase();
                let strong = el.getElementsByTagName("strong")[0];
                if (strong) {
                    strong.outerHTML = strong.innerHTML;
                }
                let text = el.innerHTML;
                let bolded = text.replace(
                    new RegExp(searchInput, "gi"),
                    (match) => `<strong>${match}</strong>`
                );
                el.innerHTML = bolded;
            });
        },
    },
    watch: {
        searchInput() {
            this.boldInput();
        },
        searchResultsUsers() {
            setTimeout(() => {
                this.boldInput();
            }, 100);
        },
        searchResultsServices() {
            this.boldInput();
        },
    },
    asyncComputed: {
        async searchResultsUsers() {
            if (this.searchInput.length < 2) {
                return [];
            }
            const response = await axios.get(
                `/api/users?search=${this.searchInput}&max=3`
            );

            return response.data.data;
        },
    },
    computed: {
        searchResultsServices() {
            let results = [];
            let searchInput = this.searchInput.toLowerCase();
            if (searchInput.length < 2) {
                return [];
            }
            this.categories.forEach((category) => {
                category.skills.forEach((skill) => {
                    skill.name = skill.name.toLowerCase();
                    if (skill.name.includes(searchInput)) {

                        results.push(skill);
                    }
                });
            });
            return results;
        },
    },
};
</script>

<style></style>
