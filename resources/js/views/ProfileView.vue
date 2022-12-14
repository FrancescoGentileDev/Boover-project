<script setup>
import UserDisplayCardComponent from '@/components/UserDisplayCardComponent.vue';
</script>

<template>
  <div>
    <div v-if="!isProfileViewActive">
      <ul>
        <li v-for="user in users">
          <UserDisplayCardComponent :user="user" v-on:view-profile="getUserProfile" />
        </li>
      </ul>

      <button @click="prevPage()">Previous Page</button>
      <button @click="nextPage()">Next Page</button>

      <p>Current Page {{ currentPage }}</p>
    </div>

    <div v-else>
      <section id="profile-view" class="debug profile-view">
        <p>{{ activeProfile.name }}</p>
        <button @click="closeActiveProfile()">Go Back</button>
      </section>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        users: {},
        currentPage: 1,
        isProfileViewActive: false,
        activeProfile: {},
      }
    },

    methods: {
      getAllUsers() {
        axios.get('/api/users/?page=' + this.currentPage)
        .then((response) => {
          console.log(response.data.data);
          this.users = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        })
      },

      getUserProfile(id) {
        axios.get('/api/users/' + id)
          .then((response) => {
            this.activeProfile = response.data;
            console.log('Debug - Current Active Profile', this.activeProfile);
            this.isProfileViewActive = true;
          })
      },

      closeActiveProfile() {
        this.isProfileViewActive = false;
      },

      // Pagination
      nextPage() {
        this.currentPage++;
        this.getAllUsers();
      },
      prevPage() {
        this.currentPage--;
        this.getAllUsers();
      }
    },

    mounted() {
      console.log('Page Mounted');

      this.getAllUsers();
    }
  }
</script>

<style lang="scss" scoped>
.debug {
  &.profile-view {
    width: 90%;
    height: 90%;

    background-color: black;
    color: white;
  }
}
</style>
