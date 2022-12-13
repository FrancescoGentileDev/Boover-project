<template>
    <div class="fixed w-full bg-base-200 shadow-sm">
        <!-- Require css -->

        <nav class="container mx-auto py-5 flex items-center justify-between">
            <div class="sinistra flex gap-24">
                <div class="logo">
                    <p class="font-extrabold text-4xl">BOOVER!</p>
                </div>

                <div class="search relative">
                    <input
                        type="text"
                        class="input max-w-[18rem] h-10 border-base-content border-opacity-50 rounded-md focus:outline-none focus:border-primary"
                        placeholder="Search"
                    />
                    <button
                        class="bg-primary bg-opacity-80 h-10 px-4 absolute right-0 rounded-r-md hover:bg-opacity-100"
                    >
                        <em
                            class="fa-solid fa-magnifying-glass text-xl text-base-100"
                        ></em>
                    </button>
                </div>
            </div>

            <div
                class="destra font-semibold text-xl text-base-content flex gap-8 items-center uppercase"
            >
                <a href="#">il team</a>
                <a class="btn btn-primary" href="/login"> Accedi </a>
                <a class="btn btn-outline" href="/register"> Registrati </a>
            </div>
        </nav>
        <div class="border-t-2"></div>
        <div class="py-2 container mx-auto hidden sm:block relative">
            <div id='drops' class="flex gap-12 flex-nowrap justify-center whitespace-nowrap sm:pl-[44rem] lg:pl-[27rem] ">
                <div
                    v-for="(category, index) in categories"
                    :key="index"
                    class="dropdown dropdown-hover"
                >
                    <label tabindex="0" class="category font-semibold hover:underline underline-offset-[0.65rem] outline-2 ">{{ category.name }}</label>
                    <ul
                        tabindex="0"
                        class="dropdown-content top-5 menu p-2  shadow bg-base-100 rounded-md w-52" :class="{'right-0' : categories.length / 2 > index? false : true}"
                    >
                        <li v-for="(skill, index) in category.skills" :key="index"><a :href="'/skill/'+ skill.slug">{{ skill.name }}</a></li>
                    </ul>
                </div>
                <button class="control-button absolute left-[-4vw] h-full aspect-square bg-gradient-to-r from-base-100 to-base-200 top-0"> < </button>

                <button class="control-button absolute left-[91vw] h-full aspect-square  bg-gradient-to-r from-base-100 top-0">></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        categories: [],
    }),
    created() {
        axios.get("/api/category").then((response) => {
            console.log(response.data);
            this.categories = response.data;
        });
    },
    mounted() {

    },
};
</script>

<style lang="scss" scoped>
label {
    &.category {
        text-decoration-color: hsl(var(--p) / var(--tw-bg-opacity));
        text-decoration-thickness: 0.225em;
    }
}


</style>
