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
        users: [],
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
};
</script>

<style></style>
