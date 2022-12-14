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

}
</script>

<style>

</style>
