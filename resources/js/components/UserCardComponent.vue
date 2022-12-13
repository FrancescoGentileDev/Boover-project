<template>
  <div>

  </div>
</template>

<script>
export default {
    props: {
        height: {
            type: String,
            default: '100px'
        }
    }
}
</script>

<style lang="scss" scoped>
div {
    height: v-bind(height);
}
</style>
