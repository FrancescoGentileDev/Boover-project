<template>
    <div class="container mx-auto py-20">
        <h1 class="text-4xl font-bold py-5">
            Risultati ricerca:
            {{ this.$route.query.search.split("-").join(" ") }}
        </h1>
        <div class="my-12">
            <div class="totals flex flex-col justify-between">
                <filter-component

                />
                <div
                    v-if="displayUsers && users.data.length === 0"
                    class="my-8 flex flex-col justify-center items-center"
                >
                    <p class="text-xl my-2 font-semibold text-base-content">
                        Nessun risultato trovato
                    </p>
                    <lottie-animation
                        class="lottie container mx-auto h-[50vh]"
                        ref="anim"
                        :animationData="require('../../assets/sad-dog.json')"
                        :loop="true"
                    />
                </div>
                <p v-else-if="displayUsers">
                    Professionisti totali: {{ users.total }}
                </p>
                <div v-else class="flex items-baseline">
                    <p>professionisti totali:</p>
                    <div
                        class="ph-item"
                        style="border: none; padding: 0px; width: 50px"
                    >
                        <div class="ph-row">
                            <div class="ph-col-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
            v-if="displayUsers"
        >
            <router-link
                :to="'/profile/' + user.slug"
                v-for="(user, index) in users.data"
                :key="index"
            >
                <user-card-component :user="user" />
            </router-link>
        </div>

        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
            v-else
        >
            <div
                v-for="i in 23"
                :key="i"
                class="ph-item sm:min-h-[440px] sm:min-w-[300px] sm:max-w-[400px] relative"
                style="padding: 0px"
            >
                <div class="ph-col-12" style="padding: 0px">
                    <div class="ph-picture" style="height: 200px"></div>
                    <div class="ph-row">
                        <div
                            class="ph-col-12 big h-[80px]"
                            style="height: 80px"
                        ></div>
                    </div>
                    <div class="ph-row">
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                    </div>
                    <div class="ph-row absolute bottom-0 h-5 w-full">
                        <div class="ph-col-4"></div>
                        <div class="ph-col-4 empty"></div>
                        <div class="ph-col-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
            v-if="placeHolderNewUser"
        >
            <div
                v-for="i in 23"
                :key="i"
                class="ph-item sm:min-h-[440px] sm:min-w-[300px] sm:max-w-[400px] relative"
                style="padding: 0px"
            >
                <div class="ph-col-12" style="padding: 0px">
                    <div class="ph-picture" style="height: 200px"></div>
                    <div class="ph-row">
                        <div
                            class="ph-col-12 big h-[80px]"
                            style="height: 80px"
                        ></div>
                    </div>
                    <div class="ph-row">
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                        <div class="ph-col-12"></div>
                    </div>
                    <div class="ph-row absolute bottom-0 h-5 w-full">
                        <div class="ph-col-4"></div>
                        <div class="ph-col-4 empty"></div>
                        <div class="ph-col-4"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hiddenevent" v-observe-visibility="loadMoreProfile"></div>
    </div>
</template>

<script>
import FilterComponent from "../components/filterComponent.vue";
import UserCardComponent from "../components/UserCardComponent.vue";
import LottieAnimation from 'lottie-web-vue'
export default {
    components: { UserCardComponent, FilterComponent, LottieAnimation },

    data: () => ({
        search: "",
        displayUsers: false,
        placeHolderNewUser: false,
        users: [],
        currentPage: 1,
        activeQuery: {},
        filtersActive: {
            onlySponsor: false,
            mostReviewed: false,
            rating_min: 1,
            rating_max: 5,
        },
    }),
    watch: {
        $route(to, from) {
            this.users = [];
            if (!this.$route.query.search || this.$route.query.search == "") {
                this.$router.push({ name: "home" });
            }
            console.log("route changed");
            // Torna alla home se non ?? presente lo slug
            this.users = [];
            this.activeQuery = this.filter(true);
            this.search = this.$route.query.search;
            this.currentPage = this.$route.query.page || 1;
            this.displayUsers = false;
            window.scrollTo(0, 0);
            this.getProfiles();
        },
    },
    created() {
        if (!this.$route.query.search || this.$route.query.search == "") {
            this.$router.push({ name: "home" });
        }
    },
    mounted() {
        this.$parent.paddingHandling(true, 1000);

        this.activeQuery = this.filter(true);
        this.search = this.$route.query.search;
        window.scrollTo(0, 0);
        this.getProfiles();
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
    methods: {
        filter(notPage = false, lazyMode = false) {
            let queryBuilder = "";
            //controlla se nella query ?? presente la pagina
            if (lazyMode) {
                this.currentPage = this.currentPage + 1;
                queryBuilder += `&page=${this.currentPage}`;
                console.log("lazy", this.currentPage);
            } else if (this.$route.query.page && !notPage) {
                this.currentPage = this.$route.query.page;
                queryBuilder += `&page=${this.currentPage}`;
            } else if (!this.$route.query.page && !notPage) {
                this.currentPage = 1;
            }

            //controlla se nella query sono prenseti i filtri

            //controlla se nella query ?? presente solo sponsor

            if (
                this.$route.query.only_sponsorized &&
                this.$route.query.only_sponsorized == "true"
            ) {
                this.filtersActive.onlySponsor = true;
                queryBuilder += `&only_sponsor=${this.filtersActive.onlySponsor}`;
            } else {
                this.filtersActive.onlySponsor = false;
            }
            //controlla se nella query ?? presente solo sponsor
            if (
                this.$route.query.most_reviewed &&
                this.$route.query.most_reviewed == "true"
            ) {
                this.filtersActive.mostReviewed = true;
                queryBuilder += `&most_reviewed=${this.filtersActive.mostReviewed}`;
            } else {
                this.filtersActive.mostReviewed = false;
            }
            //controlla se nella query ?? presente il rating minimo
            if (
                this.$route.query.rating_min &&
                this.$route.query.rating_min != 1
            ) {
                this.filtersActive.rating_min = this.$route.query.rating_min;
                queryBuilder += `&rating_min=${this.filtersActive.rating_min}`;
            } else {
                this.filtersActive.rating_min = 1;
            }
            //controlla se nella query ?? presente il rating massimo
            if (
                this.$route.query.rating_max &&
                this.$route.query.rating_max != 5
            ) {
                this.filtersActive.rating_max = this.$route.query.rating_max;
                queryBuilder += `&rating_max=${this.filtersActive.rating_max}`;
            } else {
                this.filtersActive.rating_max = 5;
            }
            console.log(
                "query from builder: ",
                this.$route.query,
                queryBuilder
            );
            return queryBuilder;
        },
        async getProfiles(newPage = false, lazyMode = false) {
            axios
                .get(
                    `/api/users?search=${this.search}&max=24` +
                        this.filter(false, lazyMode)
                )
                .then(({ data }) => {
                    console.log("users", data);
                    if (!newPage) this.users = data;
                    else this.users.data = [...this.users.data, ...data.data];
                    this.displayUsers = true;
                    this.placeHolderNewUser = false;
                });
        },
        loadMoreProfile(isVisible, entry, customArgument) {
            console.log("entryy", entry);
            console.log("isVisible", isVisible);
            if (isVisible && this.currentPage < this.users.last_page) {
                this.placeHolderNewUser = true;
                this.getProfiles(true, true);
            }
        },
    },
};
</script>

<style>
.hiddenevent {
    position: absolute;
    height: 3px;
    width: 100%;
    bottom: 115rem;
}
</style>
