<template>
  <section id="profile-details" class="p-3">
    <div class="flex flex-col-reverse">
      <article id="profile-info" class="text-center">
        <h1 class="text-2xl">{{ activeProfile.name }} {{ activeProfile.lastname }}</h1>
        <p>{{ displaySkills }}</p>

        <p v-if="activeProfile.is_available">Hire Me!</p>
        <p v-else>Currently Unavailable</p>

        <p>{{ activeProfile.email }}</p>
        <p>{{ activeProfile.phone }}</p>
      </article>

      <div id="profile-picture" class="overflow-hidden rounded-full aspect-square mx-auto w-1/4">
        <img :src="activeProfile.avatar" :alt="'Picture of ' + activeProfile.name"
          class="w-full object-cover"
        />
      </div>
    </div>

    <article class="text-center">
      <h2>Description</h2>
      <p>{{ activeProfile.detailed_description }}</p>
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
    }
  }
</script>

<style lang="scss" scoped>

</style>
