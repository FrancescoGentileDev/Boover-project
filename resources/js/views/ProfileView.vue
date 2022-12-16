<template>
  <section id="profile-details" class="p-3 flow pt-10">
    <div class="flex flex-col-reverse">
      <article id="profile-info" class="text-center mx-auto flow mt-4 max-w-prose">
        <h1 class="text-2xl">Hi, I'm <span class="text-violet-500">{{ activeProfile.name }} {{ activeProfile.lastname }}</span></h1>
        <p>{{ displaySkills }}</p>

        <p>{{ activeProfile.presentation }}</p>

        <button v-if="activeProfile.is_available" class="btn btn-primary">Hire Me!</button>
        <button v-else class="btn btn-disabled">Currently Unavailable</button>

        <section>
          <h2>Contacts</h2>
          <p>{{ activeProfile.email }}</p>
          <p>{{ activeProfile.phone }}</p>
        </section>
      </article>

      <div id="profile-picture" class="overflow-hidden rounded-full aspect-square mx-auto w-1/4">
        <img :src="activeProfile.avatar" :alt="'Picture of ' + activeProfile.name"
          class="w-full object-cover"
        />
      </div>
    </div>

    <article class="text-center mx-auto flow bg-violet-600 text-white rounded-md p-6 lg:w-max">
      <h2>Description</h2>
      <p class="mx-auto max-w-prose">{{ activeProfile.detailed_description }}</p>
    </article>
  </section>
</template>

<script>
  export default {
    data() {
      return {
        activeProfile: {},
      }
    },

    computed: {
      displaySkills() {
        if(!('skills' in this.activeProfile)) return ''; // Guard Statemente
        return this.activeProfile.skills.map(skill => skill.name).join(', '); // Map a new array and join to string
      }
    },

    methods: {
      getUserProfile(id) {
        axios.get('/api/users/' + id)
          .then((response) => {
            this.activeProfile = response.data;
            console.log('Debug - Current Active Profile', this.activeProfile);
          })
      },
    },

    created() {
      this.getUserProfile(this.$route.params.slug);
      this.$parent.paddingHandling(true);

    }
  }
</script>

<style lang="scss" scoped>


.flow > * + * {
  margin-top: 1em;
}
</style>
