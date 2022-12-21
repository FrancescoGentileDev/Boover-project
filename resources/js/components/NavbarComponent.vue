<template>
  <div class="fixed w-full nav0 nav0-sfondo shadow-sm z-50" ref="inside">
    <!-- Require css -->

    <nav
      ref="nav"
      class="
        container
        mx-auto
        sm:py-5
        flex flex-col
        sm:flex-row
        items-center
        justify-between
      "
    >
      <div
        class="
          sinistra
          w-full
          md:w-1/2
          gap-3
          flex flex-col
          sm:flex-row
          md:gap-12
          p-3
          md:justify-start md:items-center
        "
        :class="scrollY > 0 ? 'md:justify-center' : 'md:justify-start'"
      >
        <div class="flex justify-between items-center pb-3">
          <button
            @click="toggleSidebar"
            class="sm:hidden text-3xl nav0 nav0-text"
          >
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="logo md:pb-0 w-48">
            <router-link
              to="/"
              class="
                font-extrabold
                text-4xl text-center
                md:text-left
                nav0 nav0-text
              "
            >
              <svg
                id="Livello_1"
                data-name="Livello 1"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 810.64 191.46"
                class=""
              >
                <path
                  id="b"
                  d="M70.42,86.61c20,0,35.72,14.9,35.72,34.44s-15.42,34.43-35.72,34.43c-11.31,0-21.59-3.85-28.79-10.53V97.4C49.09,90.21,58.85,86.61,70.42,86.61ZM147,121.05C147,82,116.42,51.14,77.61,51.14a61.69,61.69,0,0,0-36,11.31V0L0,9v179.9H41.12v-7.71a68.13,68.13,0,0,0,35.21,9.51C115.91,190.69,147,160.11,147,121.05Z"
                  style=""
                  class="nav0 nav0-text"
                />
                <path
                  id="o_1"
                  d="M210.23,155.48c-18.77,0-33.16-15.16-33.16-34.43,0-19.54,14.65-34.7,33.16-34.7s33.15,15.16,33.15,34.7C243.38,140.32,229,155.48,210.23,155.48Zm-73.76-34.43c0,39.57,32.38,70.41,73.76,70.41S284,160.62,284,121.05,251.6,50.37,210.23,50.37,136.47,81.47,136.47,121.05Z"
                  style=""
                  class="nav0 nav0-text"
                />
                <path
                  id="o_2"
                  d="M347.21,155.48c-18.76,0-33.16-15.16-33.16-34.43,0-19.54,14.65-34.7,33.16-34.7s33.15,15.16,33.15,34.7C380.36,140.32,366,155.48,347.21,155.48Zm-73.76-34.43c0,39.57,32.38,70.41,73.76,70.41S421,160.62,421,121.05s-32.39-70.68-73.76-70.68S273.45,81.47,273.45,121.05Z"
                  style=""
                  class="nav0 nav0-text"
                />
                <polygon
                  id="v"
                  points="454.89 188.9 495.5 188.9 553.58 52.94 509.37 52.94 475.71 136.21 442.04 52.94 396.81 52.94 454.89 188.9"
                  style=""
                  class="nav0 nav0-text"
                />
                <path
                  id="e"
                  d="M599.58,84.55c13.37,0,24.16,8.48,28.53,21.59h-56.8C575.42,92.52,585.7,84.55,599.58,84.55Zm60.65,86.35-27.5-24.41c-6.42,6.68-15.93,10.28-27.24,10.28-15.67,0-28-8.74-33.41-21.59H669V124.9c0-42.92-28.78-74.27-68.62-74.27s-70.93,30.84-70.93,70.42,32.38,70.41,74,70.41C626.05,191.46,643,185.3,660.23,170.9Z"
                  style=""
                  class="nav0 nav0-text"
                />
                <path
                  id="r"
                  d="M663.32,188.89H705V102.54a37.1,37.1,0,0,1,31.61-17.22,47.69,47.69,0,0,1,19.79,4.12V53.2c-3.6-2.31-7.71-3.09-15.68-3.34A44.89,44.89,0,0,0,705,66.56V52.94H663.32Z"
                  style=""
                  class="nav0 nav0-text"
                />
                <circle
                  id="green_point"
                  cx="782.19"
                  cy="163.01"
                  r="28.45"
                  style="fill: #39b772"
                />
              </svg>
            </router-link>
          </div>
          <button class="sm:hidden text-xl nav0 nav0-text">Iscriviti</button>
        </div>
        <div
          class="searchNav w-full relative"
          :class="{ 'sm:hidden': scrollY <= 0 && !showOnZero }"
        >
          <input
            @keyup.enter="search"
            type="text"
            class="
              nav0-sfondo nav0-text nav0
              input
              w-full
              h-10
              border-base-content border-opacity-50
              bg-base-200
              rounded-md
              focus:outline-none focus:border-primary
            "
            placeholder="Search"
            v-model="searchInput"
          />
          <button
            class="
              bg-primary bg-opacity-80
              h-10
              px-4
              absolute
              right-0
              rounded-r-md
              hover:bg-opacity-100
              hidden
              md:inline-block
            "
            @click="search"
          >
            <em class="fa-solid fa-magnifying-glass text-xl text-base-100"></em>
          </button>

          <div
            v-if="searchInput.length > 0 && inputFocus === true"
            class="
              searchPanel
              absolute
              z-50
              bottom-0
              translate-y-full
              left-0
              w-full
              bg-base-100
              border
              rounded-lg
              border-base-300
              shadow-md
              md:px-8 md:py-2
            "
          >
            <div class="users pt-3 flex flex-col">
              <router-link
                :to="'/profile/' + user.slug"
                class="p-1 pl-5 hover:bg-base-300 rounded-lg w-full"
                v-for="(user, index) in searchResultsUsers"
                :key="index"
                >{{ user.name }} {{ user.lastname }}</router-link
              >

              <router-link
                :to="'/search?search=' + searchInput"
                class="block p-1 bg-base-200 my-2 rounded-lg"
              >
                <em class="fa-solid fa-magnifying-glass"></em>
                Cerca "{{ searchInput }}"
              </router-link>
            </div>
          </div>
        </div>
      </div>

      <div
        class="
          destra
          font-semibold
          text-xl text-base-content
          items-center
          uppercase
          hidden
          sm:flex
        "
      >
        <router-link
          to="/ourteam"
          class="
            btn btn-warning
            bg-yellow-300
            flex flex-row
            items-center
            justify-center
            mr-3
            md:inline
            nav0 nav0-text
          "
          style="color: purple; display: flex !important; border: none"
          >il team</router-link
        >
        <a class="btn btn-primary m-3" href="/login"> Accedi </a>
        <a class="btn btn-outline m-3 nav0 nav0-text" href="/register">
          Registrati
        </a>
      </div>
      <div
        class="sidebar absolute h-screen w-56 bg-base-200 top-0 left-0 z-30 p-3"
        :class="{ hidden: !ShowSidebar }"
      >
        <div class="flex flex-col w-full">
          <div class="close flex justify-end">
            <button class="closeButton text-3xl" @click="toggleSidebar">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>
        </div>

        <div
          v-for="(category, index) in categories"
          :key="index"
          tabindex="0"
          class="collapse collapse-arrow"
        >
          <div class="collapse-title text-xl font-medium">
            {{ category.name }}
          </div>
          <div class="collapse-content">
            <ul class="">
              <li
                class="py-2 hover:bg-base-300 rounded-md"
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
    </nav>

    <div class="border-t-2" :hidden="scrollY <= 0 && !showOnZero"></div>
    <div
      ref="categoryLine"
      class="py-2 categoryLine container mx-auto hidden relative"
      :class="scrollY > 400 || categoriesOnZero ? 'sm:block' : 'sm:hidden'"
    >
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
            class="
              category
              font-semibold
              hover:underline
              underline-offset-[0.65rem]
              outline-2
            "
            >{{ category.name }}</label
          >
          <ul
            tabindex="0"
            class="
              dropdown-content
              top-5
              menu
              p-2
              shadow
              bg-base-100
              rounded-md
              w-52
            "
            :class="{
              'right-0': categories.length / 2 > index ? false : true,
            }"
          >
            <li v-for="(skill, index) in category.skills" :key="index">
              <router-link :to="'/skill/' + skill.slug">{{
                skill.name
              }}</router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    categories: [],

    ShowSidebar: false,
    searchInput: "",
    scrollY: 0,
    navs: undefined,
    inputFocus: true,
    showOnZero: true,
    categoriesOnZero: true,
  }),
  created() {
    axios.get("/api/category").then((response) => {
      this.categories = response.data;
    });
  },
  mounted() {
    let navs = document.querySelectorAll(".nav0");
    this.navs = navs;
    this.inputFocusHandler();
    this.actionInScrollHandler();
  },
  methods: {
    inputFocusHandler() {
      // GESTIONE FOCUS INPUT
      window.addEventListener("click", (e) => {
        if (document.querySelector(".searchNav") == e.target.parentNode) {
          this.inputFocus = true;
        } else {
          this.inputFocus = false;
        }
      });
    },

    actionInScrollHandler() {
      if (this.showOnZero) {
        this.navs.forEach((el) => {
          el.classList.remove("nav0");
        });
      } else {
        this.navs.forEach((el) => {
          el.classList.add("nav0");
        });
      }
      window.addEventListener("scroll", (event) => {
        this.scrollY = window.scrollY;
        this.showOnZeroHandler();
      });
    },
    showOnZeroHandler() {
      if (!this.showOnZero) {
        if (window.scrollY > 10) {
          this.navs.forEach((el) => {
            el.classList.remove("nav0");
          });
        } else {
          this.navs.forEach((el) => {
            el.classList.add("nav0");
          });
        }
      }
    },
    toggleShowOnZero(bool) {
      this.showOnZero = bool;
      this.actionInScrollHandler();
    },
    toggleCategoriesOnZero(bool) {
      this.categoriesOnZero = bool;
    },

    toggleSidebar() {
      this.ShowSidebar = !this.ShowSidebar;
    },
    search() {
      this.$router.push({
        path: "/search",
        query: { search: this.searchInput },
      });
    },
    boldInput() {
      document.querySelectorAll(".searchPanel ul li a").forEach((el) => {
        let searchInput = this.searchInput.toLowerCase();
        let strong = el.getElementsByTagName("strong")[0];
        if (strong) {
          strong.outerHTML = strong.innerHTML;
        }
        let text = el.innerHTML;
        let bolded = text.replace(
          new RegExp(searchInput, "gi"),
          (match) => `<strong>${match}</strong>`
        );
        el.innerHTML = bolded;
      });
    },
  },
  asyncComputed: {
    async searchResultsUsers() {
      const response = await axios.get(
        `/api/users?search=${this.searchInput}&max=6`
      );

      return response.data.data;
    },
  },
  watch: {
    searchInput() {
      this.boldInput();
    },
    searchResultsUsers() {
      setTimeout(() => {
        this.boldInput();
      }, 100);
    },
  },
};
</script>

<style scoped>
label.category {
  text-decoration-color: hsl(var(--p) / var(--tw-bg-opacity));
  text-decoration-thickness: 0.225em;
}
</style>
