<template>
    <div class="container mx-auto py-10 relative">
        <h1 class="text-4xl font-bold">{{ skill.name }}</h1>
        <p class="mt-3 font-semibold text-neutral">{{ skill.description }}</p>
        <div class="skill mt-12">
            <div class="totals flex flex-col justify-between">
                <filter-component />
                <p>Professionisti totali: {{ users.total }}</p>
            </div>
        </div>
        <div class="user mt-5">
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
        </div>

        <div class="hiddenevent" v-observe-visibility="loadMoreProfile"></div>
        <!-- <div class="btn-group mt-5 flex justify-center">
            <router-link
                :to="`?page=` + page + activeQuery"
                v-for="page in users.last_page"
                :key="page"
                class="btn btn-lg"
                :class="{ 'btn-active': page == currentPage }"
                >{{ page }}</router-link
            >
        </div> -->
    </div>
</template>

<script>
import FilterComponent from "../components/filterComponent.vue";
import UserCardComponent from "../components/UserCardComponent.vue";
export default {
    components: { UserCardComponent, FilterComponent },
    data: () => ({
        skill: [],
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
            console.log("route changed");
            // Torna alla home se non è presente lo slug
            if (!this.$route.params.slug) {
                this.$router.push({ path: "/" });
            }
            this.users = [];
            this.activeQuery = this.filter(true);
            this.currentPage = this.$route.query.page || 1;
            this.getProfiles(true);
        },
    },
    created() {
        // Torna alla home se non è presente lo slug
        console.log(this.$route.params.slug);
        if (!this.$route.params.slug) {
            this.$router.push({ path: "/" });
        }
    },
    mounted() {
        this.$parent.paddingHandling(true, 1000);

        this.activeQuery = this.filter(true);

        this.getProfiles();
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
            console.log(this.$route.query, queryBuilder);
            return queryBuilder;
        },
        movePage(page) {
            this.$router.push({
                path: this.$route.path,
                query: { page: page, ...this.$route.query },
            });
        },
        async getProfiles(notSkills = false,newPage = false,lazyMode = false) {
            if (
                (this.skill == undefined || this.skill.length == 0) &&
                !notSkills
            ) {
                console.log("PASSED");

                await axios
                    .get(`/api/skills/${this.$route.params.slug}?slug=true`)
                    .then((response) => {
                        console.log("skill", response.data);
                        this.skill = response.data;
                    });
            }
            axios
                .get(
                    `/api/users?skill=${this.skill.id}&max=24` +
                        this.filter(false, lazyMode)
                )
                .then(({ data }) => {
                    console.log("users", data);
                    if (!newPage) this.users = data;
                    else this.users.data = [...this.users.data, ...data.data];
                });
        },
        loadMoreProfile(isVisible, entry, customArgument) {
            console.log("entryy", entry)
            console.log("isVisible", isVisible)
            if (isVisible && this.currentPage < this.users.last_page) {
                this.getProfiles(false, true, true);
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
