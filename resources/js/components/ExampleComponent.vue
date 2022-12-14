<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">
            I'm an example component.
          </div>

          <p>{{ test }}</p>

          <ul>
            <li v-for="user in users">
              <p>{{ user.name }} {{ user.lastname }}</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      test: String,
    },

    data() {
      return {
        users: {},
        baseUrl: process.env.MIX_APP_URL,
      }
    },

    methods: {
      requestExample() {
        axios.get('/api/users')
        .then((response) => {
          console.log(response.data.data);
          this.users = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        })
      }
    },

    mounted() {
      console.log('Example component mounted.')
      console.log(process.env.MIX_APP_URL)
      this.requestExample();
    }
  }
</script>
