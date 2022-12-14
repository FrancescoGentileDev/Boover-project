<template>
  <section id="profile-details" class="p-3">
    <div id="profile-picture" class="overflow-hidden rounded-full aspect-square mx-auto w-1/4">
      <img :src="activeProfile.avatar" :alt="'Picture of ' + activeProfile.name"
        class="w-full object-cover"
      />
    </div>

    <div id="profile-info" class="text-center">
      <h1 class="text-2xl">{{ activeProfile.name }} {{ activeProfile.lastname }}</h1>
      <p>{{ displaySkills }}</p>
    </div>
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
        if(!('skills' in this.activeProfile)) return '';
        return this.activeProfile.skills.map(skill => skill.name).join(', ');
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
