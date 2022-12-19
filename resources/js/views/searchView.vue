<template>
    <div class="container mx-auto py-20">
        <h1 class="text-4xl font-bold py-5">
            Risultati ricerca:
            {{ this.$route.query.search.split("-").join(" ") }}
        </h1>
        <div class="mt-12">
            <div class="totals flex flex-col justify-between">
                <filter-component />
                <p>Professionisti totali: {{ users.total }}</p>
            </div>
        </div>
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"
        >
            <router-link
                :to="'/profile/' + user.slug"
                v-for="(user, index) in users.data"
                :key="index"
            >
                <user-card-component :user="user" />
            </router-link>
        </div>

        <div class="hiddenevent" v-observe-visibility="loadMoreProfile"></div>

    </div>
</template>

<script>
import FilterComponent from "../components/filterComponent.vue";
import UserCardComponent from "../components/UserCardComponent.vue";
export default {
    components: { UserCardComponent, FilterComponent },

    data: () => ({
        search: "",
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
            console.log(to.query.search);
            axios
                .get(`/api/users?search=${to.query.search}`)
                .then((response) => {
                    console.log(response.data);
                    this.users = response.data;
                });
        },
    },
    created() {
        if (!this.$route.query.search || this.$route.query.search == "") {
            this.$router.push({ name: "home" });
        }
        axios
            .get(`/api/users?search=${this.$route.query.search}`)
            .then((response) => {
                console.log(response.data);
                this.users = response.data;
            });
    },
    mounted() {
        this.$parent.paddingHandling(true,1000);
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
    methods: {
        filter(notPage = false, lazyMode = false) {
            let queryBuilder = "";
            //controlla se nella query è presente la pagina
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

            //controlla se nella query è presente solo sponsor

            if (
                this.$route.query.only_sponsorized &&
                this.$route.query.only_sponsorized == "true"
            ) {
                this.filtersActive.onlySponsor = true;
                queryBuilder += `&only_sponsor=${this.filtersActive.onlySponsor}`;
            } else {
                this.filtersActive.onlySponsor = false;
            }
            //controlla se nella query è presente solo sponsor
            if (
                this.$route.query.most_reviewed &&
                this.$route.query.most_reviewed == "true"
            ) {
                this.filtersActive.mostReviewed = true;
                queryBuilder += `&most_reviewed=${this.filtersActive.mostReviewed}`;
            } else {
                this.filtersActive.mostReviewed = false;
            }
            //controlla se nella query è presente il rating minimo
            if (
                this.$route.query.rating_min &&
                this.$route.query.rating_min != 1
            ) {
                this.filtersActive.rating_min = this.$route.query.rating_min;
                queryBuilder += `&rating_min=${this.filtersActive.rating_min}`;
            } else {
                this.filtersActive.rating_min = 1;
            }
            //controlla se nella query è presente il rating massimo
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
                });
        },
        loadMoreProfile(isVisible, entry, customArgument) {
            console.log("entryy", entry);
            console.log("isVisible", isVisible);
            if (isVisible && this.currentPage < this.users.last_page) {
                this.getProfiles(true, true);
            }
        },
    },
};
</script>

<style></style>
