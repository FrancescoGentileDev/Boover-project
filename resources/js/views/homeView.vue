<template>
    <div>
        <main-hero-section :categories="categories"/>
        <skills-showcase-section></skills-showcase-section>
    </div>
</template>

<script>
import HomeHeroSection from "../sections/HomeHeroSection.vue";
import MainHeroSection from "../sections/mainHeroSection.vue";
import SkillsShowcaseSection from "../sections/SkillsShowcaseSection.vue";
export default {
    name: "HomeView",

    components: { SkillsShowcaseSection, HomeHeroSection, MainHeroSection },
    props: {
        categories: {
            type: Array,
            default: () => [],
        },
    },
};
</script>

<style></style>
