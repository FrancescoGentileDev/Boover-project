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
              <star-system-component @ratingRange="ratingEvent" :pminRating="rating_min" :pmaxRating="rating_max"/>
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
  props: {
    pisCollapsed: {
      type: Boolean,
      default: false,
    },
    ponlySponsor: {
      type: Boolean,
      default: false,
    },
    pmostReviewed: {
      type: Boolean,
      default: false,
    },
    prating_min: {
      type: Number,
      default: 1,
    },
    prating_max: {
      type: Number,
      default: 5,
    },

  },
  methods: {
    applyFilters(event) {
      event.preventDefault();
      const form = this.$refs.formMessage;
      let filterToApply = {
        rating_min: this.rating_min != 1 ? this.rating_min : null,
        rating_max: this.rating_max != 5 ? this.rating_max : null,
        only_sponsorized: this.onlySponsor ? true : null,
        most_reviewed: this.mostReviewed ? true : null,
      };
        for (const key in filterToApply) {
          if (filterToApply[key] === null) {
            delete filterToApply[key];
          }
        }

        if(this.$route.query.search) {
          filterToApply.search = this.$route.query.search;
        }



      console.log(filterToApply);
      this.$router.push({query: filterToApply})
    },
    ratingEvent(event) {
        this.rating_min = event.minRating;
        this.rating_max = event.maxRating;

    }
  },

  created() {
    console.log(this.$route.query);

    if(this.$route.query.rating_min) {
      this.rating_min =parseInt(this.$route.query.rating_min) ;
      this.isCollapsed = true;
    }
    if(this.$route.query.rating_max) {
      this.rating_max =parseInt(this.$route.query.rating_max) ;
        this.isCollapsed = true;
    }
    if(this.$route.query.only_sponsorized) {
      this.onlySponsor = this.$route.query.only_sponsorized;
      this.isCollapsed = true;
    }
    if(this.$route.query.most_reviewed) {
      this.mostReviewed = this.$route.query.most_reviewed;
        this.isCollapsed = true;
    }



  },
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

