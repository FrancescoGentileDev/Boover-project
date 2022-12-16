<template>
    <div>
        <main-hero-section :categories="categories" />
        <skills-showcase-section></skills-showcase-section>
        <testimonials-section></testimonials-section>
        <JumbotronSection></JumbotronSection>
    </div>
</template>

<script>
import HomeHeroSection from "../sections/HomeHeroSection.vue";
import JumbotronSection from "../sections/jumbotronSection.vue";
import MainHeroSection from "../sections/mainHeroSection.vue";
import SkillsShowcaseSection from "../sections/SkillsShowcaseSection.vue";
import TestimonialsSection from "../sections/TestimonialsSection.vue";
export default {
    name: "HomeView",

    components: {
        SkillsShowcaseSection,
        HomeHeroSection,
        MainHeroSection,
        TestimonialsSection,
        JumbotronSection,
    },
    props: {
        categories: {
            type: Array,
            default: () => [],
        },
    },
};
</script>

<style></style>
