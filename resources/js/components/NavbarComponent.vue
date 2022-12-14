<template>
    <div class="fixed w-full bg-base-200 shadow-sm" ref="inside">
        <!-- Require css -->

        <nav
            class="container mx-auto sm:py-5 flex flex-col sm:flex-row items-center justify-between"
        >
            <div
                class="sinistra w-full md:w-1/2 gap-3 flex flex-col sm:flex-row md:gap-12 p-3 md:justify-center md:items-center"
            >
                <div class="flex justify-between items-center pb-3">
                    <button @click="toggleSidebar" class="sm:hidden text-3xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="logo md:pb-0">
                        <p
                            class="font-extrabold text-4xl text-center md:text-left"
                        >
                            BOOVER!
                        </p>
                    </div>
                    <button class="sm:hidden text-xl">Iscriviti</button>
                </div>
                <div class="search w-full relative">
                    <input
                        type="text"
                        class="input w-full h-10 border-base-content border-opacity-50 bg-base-200 rounded-md focus:outline-none focus:border-primary"
                        placeholder="Search"
                        v-model="searchInput"

                    />
                    <button
                        class="bg-primary bg-opacity-80 h-10 px-4 absolute right-0 rounded-r-md hover:bg-opacity-100 hidden md:inline-block"
                        @click="search"
                    >
                        <em
                            class="fa-solid fa-magnifying-glass text-xl text-base-100"
                        ></em>
                    </button>
                </div>
            </div>

            <div
                class="destra font-semibold text-xl text-base-content items-center uppercase hidden sm:flex"
            >
                <a href="#" class="hidden md:inline">il team</a>
                <a class="btn btn-primary m-3" href="/login"> Accedi </a>
                <a class="btn btn-outline m-3" href="/register"> Registrati </a>
            </div>
            <div
                class="sidebar absolute h-screen w-56 bg-base-200 top-0 left-0 z-30 p-3"
                :class="{ hidden: !ShowSidebar }"
            >
                <div class="flex flex-col w-full">
                    <div class="close flex justify-end">
                        <button
                            class="closeButton text-3xl"
                            @click="toggleSidebar"
                        >
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>

                <div v-for="(category, index) in categories" :key="index"
                    tabindex="0"
                    class="collapse collapse-arrow"
                >
                    <div class="collapse-title text-xl font-medium">
                       {{ category.name }}
                    </div>
                    <div class="collapse-content">
                        <ul class="">
                            <li class="py-2 hover:bg-base-300 rounded-md " v-for="(skill, index) in category.skills" :key="index"><router-link :to="'/skill/' + skill.slug">{{ skill.name }}</router-link></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="border-t-2"></div>
        <div class="py-2 container mx-auto hidden sm:block relative">
            <div
                id="drops"
                ref="drops"
                class="flex gap-12 flex-wrap justify-center whitespace-nowrap relative"
            >
                <div
                    v-for="(category, index) in categories"
                    :key="index"
                    class="dropdown dropdown-hover"
                >
                    <label
                        tabindex="0"
                        class="category font-semibold hover:underline underline-offset-[0.65rem] outline-2"
                        >{{ category.name }}</label
                    >
                    <ul
                        tabindex="0"
                        class="dropdown-content top-5 menu p-2 shadow bg-base-100 rounded-md w-52"
                        :class="{
                            'right-0':
                                categories.length / 2 > index ? false : true,
                        }"
                    >
                        <li
                            v-for="(skill, index) in category.skills"
                            :key="index"
                        >
                            <router-link :to="'/skill/' + skill.slug">{{
                                skill.name
                            }}</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>h

<script>
export default {
    data: () => ({
        categories: [],
        ShowSidebar: false,
        searchInput: '',
    }),
    created() {
        axios.get("/api/category").then((response) => {
            console.log(response.data);
            this.categories = response.data;
        });
    },
    mounted() {},
    methods: {
        toggleSidebar() {
            this.ShowSidebar = !this.ShowSidebar;
        },
        search() {
            this.$router.push({ path: '/search', query:{search:  this.searchInput }});

        },
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
