<template>
  <div>
  sdfgjklsdgjklsdgjklsdgjklsdgklj
  </div>
</template>

<script>
export default {
    data: () => ({

    }),

mounted() {
        this.$parent.paddingHandling(true,1000);
    },
    beforeDestroy() {
        this.$parent.paddingHandling(false);
    },
}
</script>

<style lang="scss" scoped>

</style>
