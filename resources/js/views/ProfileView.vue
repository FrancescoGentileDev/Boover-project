<template>
  <section id="profile-details" class="p-3 flow pt-10">
    <div class="flex flex-col-reverse">
      <article id="profile-info" class="text-center mx-auto flow mt-4">
        <h1 class="text-2xl">Hi, I'm <span class="text-primary">{{ activeProfile.name }} {{ activeProfile.lastname }}</span></h1>
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

    <article class="text-center mx-auto flow bg-primary text-white rounded-md p-6 w-max">
      <h2>Description</h2>
      <p class="mx-auto max-w-prose">{{ activeProfile.detailed_description }}</p>
    </article>

    <div class="mt-8 lg:w-full lg:mx-6 flex justify-center">
                <div
                    class="w-1/2 px-8 py-10 mx-auto overflow-hidden bg-base-300 rounded-lg shadow-2xl shadow-gray-300/50">
                    <h1 class="text-lg font-medium text-base-content">Invia un messaggio</h1>

                    <form ref="formMessage" class="mt-6" @submit="submitMessage">
                        <div class="flex-1">
                            <label class="block mb-2 text-sm text-base-content">Full Name</label>
                            <input type="text" required placeholder="John Doe" name="nickname" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>

                        <div class="flex-1 mt-6">
                            <label class="block mb-2 text-sm text-base-content">Email address</label>
                            <input type="email" required name="email" placeholder="johndoe@example.com" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>

                        <div class="flex-1 mt-6">
                            <label class="block mb-2 text-sm text-base-content">Phone</label>
                            <input type="tel" required placeholder="1234567890" name="phone" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>

                        <div class="flex-1 mt-14">
                            <label class="block mb-2 text-sm text-base-content">Title</label>
                            <input type="text" required placeholder="Hi, i'm john doe" name="title" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>

                        <div class="w-full mt-6">
                            <label class="block mb-2 text-sm text-base-content">Message</label>
                            <textarea name="content" required class="block w-full h-32 px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md md:h-48" placeholder="Message"></textarea>
                        </div>

                        <button class="w-full px-6 py-3 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            Send
                        </button>
                    </form>
                </div>
            </div>

    <div class="mt-8 lg:w-full lg:mx-6 flex justify-center">
                <div
                    class="w-1/2 px-8 py-10 mx-auto overflow-hidden bg-base-300 rounded-lg shadow-2xl shadow-gray-300/50">
                    <h1 class="text-lg font-medium text-base-content">Invia una Recensione</h1>

                    <form ref="formReview" class="mt-6" @submit="submitReview">
                        <div class="flex-1">
                            <label class="block mb-2 text-sm text-base-content">Full Name</label>
                            <input type="text" required placeholder="John Doe" name="nickname" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>

                        <div class="flex-1 mt-14">
                            <label class="block mb-2 text-sm text-base-content">Title</label>
                            <input type="text" placeholder="Hi, i'm john doe" name="title" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>
                        <div class="flex-1 mt-14">
                            <label class="block mb-2 text-sm text-base-content">Vote</label>
                            <input type="number" min="1" max="5" placeholder="Hi, i'm john doe" name="vote" class="block w-full px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md" />
                        </div>

                        <div class="w-full mt-6">
                            <label class="block mb-2 text-sm text-base-content">Message</label>
                            <textarea name="description" class="block w-full h-32 px-5 py-3 mt-2 text-base-content placeholder-gray-400 bg-white border border-gray-200 rounded-md md:h-48" placeholder="Message"></textarea>
                        </div>

                        <button class="w-full px-6 py-3 mt-6 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            Send
                        </button>
                    </form>
                </div>
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
        if(!('skills' in this.activeProfile)) return ''; // Guard Statemente
        return this.activeProfile.skills.map(skill => skill.name).join(', '); // Map a new array and join to string
      }
    },

    methods: {
        submitMessage(event) {
            event.preventDefault();
            const form = this.$refs.formMessage;
            const formData = new FormData(form)
            let submitMessage = {
                user_id: this.activeProfile.user_id,
                nickname: formData.get('nickname'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                title: formData.get('title'),
                content: formData.get('content'),
            }

            axios.post('/api/sendMessage', submitMessage)
                .then((response) => {
                    console.log('Debug - Message Sent', response);
                    form.reset();
                })

        },
        submitReview(event) {
            event.preventDefault();
            const form = this.$refs.formReview;
            const formData = new FormData(form)
            let submitMessage = {
                user_id: this.activeProfile.user_id,
                nickname: formData.get('nickname'),
                title: formData.get('title'),
                vote: formData.get('vote'),
                description: formData.get('description'),
            }

            axios.post('/api/review/send', submitMessage)
                .then((response) => {
                    console.log('Debug - Message Sent', response);
                    form.reset();
                })

        },

      getUserProfile(id) {
        axios.get('/api/users/'+ id + '?slug=true')
          .then((response) => {
              this.activeProfile = response.data;
              console.log('Debug - Current Active Profile', response.data);
          })
      },
    },

    created() {
      this.getUserProfile(this.$route.params.slug);

    },
     mounted() {
        this.$parent.paddingHandling(true,1000);
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
  }
</script>

<style lang="scss" scoped>


.flow > * + * {
  margin-top: 1em;
}
</style>
