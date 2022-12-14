<template>
    <div class="container mx-auto py-10">
        <div class="flex flex-col sm:flex-row flex-wrap gap-8 justify-center">
            <div v-for="(user, index) in users.data" :key="index">
                <user-card-component :user="user" />
            </div>
        </div>
    </div>
</template>

<script>
import UserCardComponent from '../components/UserCardComponent.vue';
export default {
  components: { UserCardComponent },

    data: () => ({
        users: [],
    }),
    watch:{
    $route (to, from){
        console.log(to.query.search)
         axios
            .get(`/api/users?search=${to.query.search}`)
            .then((response) => {
                console.log(response.data);
                this.users = response.data;
            });
    },

} ,
    created() {
        if(!this.$route.query.search){
            this.$router.push({name: 'home'})
        }
        axios
            .get(`/api/users?search=${this.$route.query.search}`)
            .then((response) => {
                console.log(response.data);
                this.users = response.data;
            });
    },
    mounted() {
        this.$emit('search', this.$route.query.search)
    },
};
</script>

<style></style>
