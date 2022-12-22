<template>
  <div>
    <object
        v-if="startAnimation"
        ref='loader'
        data="/assets/loadingAnimation.svg"
        class="w-full h-[100vh]"
        type="image/svg+xml"
      >
        Il tuo browser non supporta gli oggetti SVG.
      </object>
  </div>
</template>

<style>
.animated-object {
  /* Imposta la transizione per 2 secondi */
  transition: all 2s;
}

.animated-object.is-animated {
  /* Imposta l'animazione sugli stili desiderati */
  transform: translateX(100px);
}
</style>

<script>
export default {
  data() {
    return {
      isAnimated: false,
      startAnimation: false,
    };
  },
  mounted() {
      this.startAnimation = true;
    window.onload = () => {
        setTimeout(() => {
            this.startAnimation = false;
            console.log('Animation ended')
            this.$parent.$data.loading = false;
        }, 1500);
    }
  },
};
</script>
