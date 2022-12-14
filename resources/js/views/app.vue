<template>
    <div>
        <NavbarComponent />
        <router-view class="pt-[8.75rem]"></router-view>
    </div>
</template>

<script>
import NavbarComponent from "../components/NavbarComponent.vue";
export default {
    components: { NavbarComponent },
};
</script>

<style scoped>

</style>
