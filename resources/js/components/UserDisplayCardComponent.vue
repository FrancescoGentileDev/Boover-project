<template>
  <div>
    <p>{{ user.name }} {{ user.lastname }}</p>

    <button @click="viewProfile(user.user_id)">See Profile</button>
  </div>
</template>

<script>
  export default {
    props: {
      user: Object,
    },

    methods: {
      viewProfile(id) {
        console.log(id);
        this.$emit('view-profile', id);
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>
