<template>
    <div>
        <div class="">SEARCH</div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div v-for="(user, index) in users.data" :key="index">
                <p>{{ user.name }} {{ user.lastname }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
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
    }
} ,
    created() {
        axios
            .get(`/api/users?search=${this.$route.query.search}`)
            .then((response) => {
                console.log(response.data);
                this.users = response.data;
            });
    },
};
</script>

<style></style>
