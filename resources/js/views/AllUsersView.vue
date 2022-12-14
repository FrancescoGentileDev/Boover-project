<script setup>
import UserDisplayCardComponent from '@/components/UserDisplayCardComponent.vue';
</script>

<template>
  <div>
    <ul>
      <li v-for="user in users">
        <UserDisplayCardComponent />
      </li>
    </ul>

    <button @click="nextPage()">Next Page</button>
    <button @click="prevPage()">Previous Page</button>

    <p>Current Page {{ currentPage }}</p>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        users: {},
        currentPage: 1,
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

</style>

<!-- <template>
  <ul>
    <li v-for="user in users">
      <p>{{ user.name }}</p>
    </li>
  </ul>
</template>

<script>
  export default {
    data() {
      return {
        users: {},
      }
    },

    computed: {
      userList() {
        return this.users;
      }
    },

    methods: {
      getAllUsers() {
        axios.get('/api/users')
        .then((response) => {
          console.log(response.data.data);
          this.users = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        })
      },
    },

    mounted() {
      console.log('Page Mounted');

      this.getAllUsers();
    }
  }
</script>

<style lang="scss" scoped>

</style> -->
