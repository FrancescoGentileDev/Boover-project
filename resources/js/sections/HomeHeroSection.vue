<template>
  <div id="hero-component" class="py-10">
    <div class="container flex flex-row py-10">
      <div class="w-2/4">
        <div class="text-2xl mb-5">Titolo di questa Hero</div>
        <div id="contents" class="flex flex-col gap-y-2">
          <div>
            <div>Content Title 1</div>
            <p>Description 1</p>
          </div>
          <div>
            <div>Content Title 2</div>
            <p>Description 2</p>
          </div>
          <div>
            <div>Content Title 3</div>
            <p>Description 3</p>
          </div>
        </div>
      </div>
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
