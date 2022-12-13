<template>
  <div id="hero-component" class="py-7">
    <div class="container">
      <div>LEFT SIDE</div>
      <div>RIGHT SIDE</div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.container {
  margin: 0 auto;
  max-width: 1200px;
}

// debug
#hero-component {
  background-color: red;
}

.container {
  border: 1px solid black;
  min-height: 600px;
}
</style>
