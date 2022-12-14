<template>
  <section id="profile-details">
    <div id="profile-picture">
      <img :src="activeProfile.avatar" :alt="'Picture of ' + activeProfile.name" />
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
    },

    mounted() {
      console.log(this.$route.params);
      this.getUserProfile(this.$route.params.slug);
    }
  }
</script>

<style lang="scss" scoped>

</style>
