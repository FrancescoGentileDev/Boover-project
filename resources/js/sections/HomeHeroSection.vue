<template>
  <div id="hero-component" class="py-10">
    <div class="container flex flex-row py-10">
      <div class="w-2/4">
        <div class="text-2xl mb-5">Titolo di questa Hero</div>
        <div id="contents" class="flex flex-col gap-y-2">
          <div>
            <div>Content Title 1</div>
            <p class="w-3/4">
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Necessitatibus at totam et accusamus in vero sint. Ex, porro quo
              error maxime praesentium eos cupiditate, labore debitis tempore
              mollitia animi cum?
            </p>
          </div>
          <div>
            <div>Content Title 2</div>
            <p class="w-3/4">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Voluptates quis nam quisquam mollitia aliquid alias ratione
              impedit consectetur sint! Quos doloribus molestiae delectus
              dolorem optio ipsum? Aspernatur laboriosam omnis consectetur!
            </p>
          </div>
          <div>
            <div>Content Title 3</div>
            <p class="w-3/4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor
              quia perspiciatis voluptatem quae pariatur sit velit omnis,
              assumenda at quaerat. Adipisci ullam dolorum vel minima? Earum
              beatae necessitatibus quod doloribus?
            </p>
          </div>
          <div>
            <div>Content Title 4</div>
            <p class="w-3/4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor
              quia perspiciatis voluptatem quae pariatur sit velit omnis,
              assumenda at quaerat. Adipisci ullam dolorum vel minima? Earum
              beatae necessitatibus quod doloribus?
            </p>
          </div>
          <div>
            <div>Content Title 5</div>
            <p class="w-3/4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor
              quia perspiciatis voluptatem quae pariatur sit velit omnis,
              assumenda at quaerat. Adipisci ullam dolorum vel minima? Earum
              beatae necessitatibus quod doloribus?
            </p>
          </div>
        </div>
      </div>
      <div class="w-2/4">
        <div class="py-8">
          <img
            src="https://images.unsplash.com/photo-1484591974057-265bb767ef71?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80"
            alt=""
            class="rounded-md"
          />
        </div>
      </div>
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
