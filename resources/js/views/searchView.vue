<template>
    <div class="container mx-auto py-10">
        <div class="flex flex-col sm:flex-row flex-wrap gap-8 justify-center">
            <router-link :to="'/profile/'+ user.slug" v-for="(user, index) in users.data" :key="index">
                <user-card-component :user="user" />
            </router-link>
        </div>

        <div class="hiddenevent" v-observe-visibility="loadMoreProfile"></div>

    </div>
</template>

<script>
import UserCardComponent from "../components/UserCardComponent.vue";
export default {
    components: { UserCardComponent },

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
