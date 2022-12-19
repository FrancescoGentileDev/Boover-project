<template>
 <div class="animation">
      <lottie-animation
        class="lottie container mx-auto h-[80vh]"
        ref="anim"
        :animationData="require('../../assets/notFound2.json')"
        :loop="true"
      />
  </div>
</template>

<script>
import LottieAnimation from 'lottie-web-vue' // import lottie-web-vue
export default {
    components: {
        LottieAnimation
    },
     mounted() {
        this.$parent.paddingHandling(true,1000);
        window.scrollTo(0, 0);
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
};
</script>

<style scoped>

</style>
