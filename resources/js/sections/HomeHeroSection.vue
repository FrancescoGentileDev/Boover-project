<template>
  <div id="hero-component" class="py-10">
    <div class="container flex flex-row">
      <div class="w-2/4">LEFT SIDE</div>
      <div class="w-2/4">RIGHT SIDE</div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.container {
  margin: 0 auto;
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
