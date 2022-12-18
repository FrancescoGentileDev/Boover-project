<template>
  <div>
    <button @click="isCollapsed = !isCollapsed" class="btn btn-md btn-accent">
      Filtri avanzati
    </button>
    <transition name="slide" >
      <div v-show="isCollapsed">
        <form @submit="applyFilters" class="flex flex-col sm:flex-row gap-9 items-end justify-end">
          <div class="form-control">
            <label class="label cursor-pointer p-0">
              <span class="label-text px-3">Solo Choice</span>
              <input
                name="only_sponsorized"
                type="checkbox"
                class="toggle toggle-primary"
                v-model="onlySponsor"
              />
            </label>
          </div>
          <div class="form-control">
            <label class="label cursor-pointer p-0">
              <span class="label-text px-3">I più recensiti</span>
              <input
                name="most_reviewed"
                type="checkbox"
                class="toggle toggle-secondary"
                v-model="mostReviewed"
              />
            </label>
          </div>

          <div class="flex flex-col items-center gap-2">
            <label for="rating-min">Range media recensioni</label>
            <div class="flex ">
              <star-system-component @ratingRange="ratingEvent"/>
            </div>
          </div>

          <button class="btn btn-md btn-accent">APPLICA</button>
        </form>
      </div>
    </transition>
  </div>
</template>


<script>
import StarSystemComponent from './starSystemComponent.vue';

export default {
  name: 'FilterComponent',
  components: {
    StarSystemComponent,
  },
  data() {
    return {
      isCollapsed: false,
      onlySponsor: false,
      mostReviewed: false,
      rating_min: 1,
      rating_max: 5,
    };
  },
  methods: {
    applyFilters(event) {
      event.preventDefault();
      const form = this.$refs.formMessage;
      const formData = new FormData(form);
      let filterToApply = {
        rating_min: parseInt(document.querySelector('input[name="rating-min"]:checked').value),
        rating_max: 5,
        only_sponsorized: formData.get('only_sponsorized'),
        most_reviewed: formData.get('most_reviewed'),
      };
      console.log(filterToApply);
    },
    ratingEvent() {

    }
  },

  mounted() {},
};
</script>


<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: all 0.3s ease;
  opacity: 1;
}
.slide-enter,
.slide-leave-to {
transform: translateY(-50px);
  opacity: 0;
}
</style>

