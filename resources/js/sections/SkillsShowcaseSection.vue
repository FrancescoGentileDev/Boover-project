<template>
    <div class="wrapper pt-24 pb-24">
        <!--  // -->

        <div class="flex bg-slate-400 m-auto gap-7 w-4/5">
            <div
                class="w-full h-96 bg-slate-400 rounded-md bg-[url('https://placeimg.com/800/400/people')] bg-cover"
                v-for="card in numberOfCards"
                :key="card"
            >
                <div id="text-container">
                    <h3>go global</h3>
                    <h1>Design</h1>
                </div>
            </div>
        </div>

        <!--  // -->
    </div>
</template>

<script>
export default {
    name: "SkillsShowcaseSection",
    data() {
        return {
            viewportWidth: 0,
            numberOfCards: "",
        };
    },
    //
    methods: {
        //
        resizeHandler(e) {
            this.viewportWidth = window.innerWidth;
            console.log(this.viewportWidth);

            this.setNumberOfCards();
        },
        //
        setNumberOfCards() {
            if (this.viewportWidth < 640) {
                this.numberOfCards = 1;
                return this.numberOfCards;
                //
            } else if (this.viewportWidth < 768) {
                this.numberOfCards = 2;
                return this.numberOfCards;
                //
            } else if (this.viewportWidth < 1024) {
                this.numberOfCards = 3;
                return this.numberOfCards;
                //
            } else if (this.viewportWidth < 1280) {
                this.numberOfCards = 4;
                return this.numberOfCards;
                //
            } else {
                this.numberOfCards = 5;
                return this.numberOfCards;
            }
        },
    },
    //
    mounted() {
        this.resizeHandler(); //setta il numero di card iniziali
        window.addEventListener("resize", this.resizeHandler);
    },
    destroyed() {
        window.removeEventListener("resize", this.resizeHandler);
    },
};
</script>

<style></style>
