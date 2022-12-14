<template>
  <section id="profile-details" class="p-3">
    <div id="profile-picture" class="overflow-hidden rounded-full aspect-square mx-auto w-1/4">
      <img :src="activeProfile.avatar" :alt="'Picture of ' + activeProfile.name"
        class="w-full object-cover"
      />
    </div>

    <div id="profile-info" class="text-center">
      <h1>{{ activeProfile.name }} {{ activeProfile.lastname }}</h1>
      <p>{{ displaySkills(activeProfile.skills) }}</p>
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

    methods: {
      getUserProfile(id) {
        axios.get('/api/users/' + id)
          .then((response) => {
            this.activeProfile = response.data;
            console.log('Debug - Current Active Profile', this.activeProfile);
          })
      },

      displaySkills(skillList) {
        const skills = skillList.map(skill => skill.name);
        return skills.join(', ');
      }
    },

    mounted() {
      console.log(this.$route.params);
      this.getUserProfile(this.$route.params.slug);
    }
  }
</script>

<style lang="scss" scoped>

</style>
