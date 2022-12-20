<template>
    <div>
        <main-hero-section :categories="categories" />
        <mark-section></mark-section>
        <skills-showcase-section></skills-showcase-section>
        <testimonials-section></testimonials-section>
        <JumbotronSection></JumbotronSection>
    </div>
</template>

<script>
import HomeHeroSection from "../sections/HomeHeroSection.vue";
import JumbotronSection from "../sections/jumbotronSection.vue";
import MainHeroSection from "../sections/mainHeroSection.vue";
import MarkSection from "../sections/MarkSection.vue";
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
        MarkSection,
    },
    props: {
        categories: {
            type: Array,
            default: () => [],
        },
    },
    watch: {
        $route(to, from) {
            window.scrollTo(0, 0);
        }
    },
    mounted() {
        console.log(this.$parent.$refs.navbar);
        this.$parent.$refs.navbar.toggleShowOnZero(false);
        this.$parent.$refs.navbar.toggleCategoriesOnZero(false);
        this.$parent.paddingHandling(false);
        window.scrollTo(0, 0);
    },
    beforeDestroy() {
        this.$parent.$refs.navbar.toggleShowOnZero(true);
        this.$parent.$refs.navbar.toggleCategoriesOnZero(true);
        this.$parent.paddingHandling(true);
    },
};
</script>

<style></style>
