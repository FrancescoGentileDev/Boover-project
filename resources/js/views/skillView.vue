<template>
    <div class="container mx-auto py-10">
        <h1 class="text-4xl font-bold">{{ skill.name }}</h1>
        <p class="mt-3 font-semibold text-neutral">{{ skill.description }}</p>
        <div class="skill mt-12">
            <div class="totals flex justify-between">
                <p>Professionisti totali: {{ users.total }}</p>
            </div>
        </div>
        <div class="user mt-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <router-link
                    :to="'/profile/' + user.slug"
                    v-for="(user, index) in users.data"
                    :key="index"
                >
                    <user-card-component :user="user" />
                </router-link>
            </div>
        </div>

        <div class="btn-group mt-5 flex justify-center">
            <router-link replace :to="'?page='+ page" v-for="page in users.last_page" :key="page" class="btn btn-lg" :class="{'btn-active': page == currentPage}">{{ page }}</router-link>
        </div>
    </div>
</template>

<script>
import UserCardComponent from "../components/UserCardComponent.vue";
export default {
    components: { UserCardComponent },
    data: () => ({
        skill: [],
        users: [],
        currentPage: 1,
    }),
    watch: {
        $route(to, from) {
            if (!this.$route.params.slug) {
                this.$router.push({ path: "/" });
            }
            if(this.$route.query.page){
                this.currentPage = this.$route.query.page;
            }
            axios
                .get(`/api/skills/${this.$route.params.slug}?slug=true`)
                .then((response) => {
                    console.log("skill", response.data);
                    this.skill = response.data;
                    axios
                        .get(`/api/users?page=${this.currentPage}&skill=${this.skill.id}&max=24`)
                        .then((response) => {
                            console.log("users", response.data);
                            this.users = response.data;
                            window.scrollTo(0, 0);
                        });
                });


        },
    },
    created() {
        console.log(this.$route.params.slug);
        if (!this.$route.params.slug) {
            this.$router.push({ path: "/" });
        }
    },
    mounted() {
        if(this.$route.query.page){
            this.currentPage = this.$route.query.page;
        }


        this.$parent.paddingHandling(true, 1000);
        axios
            .get(`/api/skills/${this.$route.params.slug}?slug=true`)
            .then((response) => {
                console.log("skill", response.data);
                this.skill = response.data;
                axios
                    .get(`/api/users?skill=${this.skill.id}&page=${this.$route.query.page}&max=24`)
                    .then((response) => {
                        console.log("users", response.data);
                        if(this.$route.query.page&& this.$route.query.page > response.data.last_page){
                            this.$router.push({path: this.$route.path, query: {page: response.data.last_page}});
                        }
                        this.users = response.data;
                    });
            });
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
};
</script>

<style></style>
