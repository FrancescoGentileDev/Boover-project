<template>
  <div class="flex h-full">
    <div
      class="
        user-card
        w-full
        sm:min-h-[440px] sm:min-w-[300px] sm:max-w-[400px]
        overflow-hidden
        bg-base-200
        rounded-lg
        shadow-lg
      "
    >
      <div class="img relative">
        <img
          class="object-cover object-center w-full sm:h-[100px] md:h-[250px]"
          :src="user.avatar"
          alt="avatar"
        />
        <div
          v-if="user.is_sponsorized"
          class="absolute badge badge-primary bottom-3 right-3"
        >
          Boover Choice!
        </div>
      </div>

      <div
        class="
          px-6
          py-2
          min-h-[128px]
          bg-base-300
          flex
          justify-center
          gap-2
          flex-wrap
          items-center
        "
      >
        <span
          class="
            text-xs
            leading-[0.6rem]
            text-lin
            font-semibold
            text-base-content
            btn btn-outline btn-sm
          "
          v-for="(skill, index) in user.skills"
          :key="index"
          >{{ skill.name }}</span
        >
      </div>

      <div class="px-6 py-2 flex flex-col">
        <h1 class="text-xl font-semibold text-base-content">
          {{ user.name }} {{ user.lastname }}
        </h1>

        <p class="py-2 text-base-content">
          {{ user.presentation }}
        </p>

        <div class="rating relative">
          <div class="stars">
            <em
              class="fa-solid fa-star"
              v-for="star in 5"
              :key="star"
              :class="{
                'text-yellow-400': star <= Math.ceil(user.reviews_rating),
                'text-gray-300': star > Math.ceil(user.reviews_rating),
              }"
            ></em>
          </div>
          <span class="text-base-content">
            {{ Math.ceil(user.reviews_rating) }}
          </span>
          <div class="absolute right-0">
            Recensioni: {{ user.reviews_count }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: Object,
    height: {
      type: String,
      default: "100px",
    },
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
.user-card {
  cursor: pointer;
}
</style>
