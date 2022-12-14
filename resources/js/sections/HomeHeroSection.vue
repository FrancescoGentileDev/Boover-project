<template>
  <div>
    <header class="bg-gray-200 dark:bg-gray-900">
      <div
        class="
          container
          flex flex-col
          px-6
          py-10
          mx-auto
          space-y-6
          lg:h-[32rem] lg:py-16 lg:flex-row lg:items-center
        "
      >
        <div class="w-full lg:w-1/2">
          <div class="lg:max-w-lg">
            <h1
              class="
                text-3xl
                font-semibold
                tracking-wide
                text-gray-800
                dark:text-white
                lg:text-4xl
              "
            >
              This hero's title
            </h1>
            <p class="mt-4 text-gray-600 dark:text-gray-300">
              Hero's description: Lorem ipsum dolor sit amet consectetur
              adipisicing elit. Debitis dicta aspernatur, eveniet, dolorem
              veniam odit dolorum assumenda quos, similique atque sed saepe!
              Maiores provident commodi laudantium autem. Aperiam, dolore
              laborum!
            </p>
            <div class="grid gap-6 mt-8 sm:grid-cols-2">
              <div
                class="flex items-center text-gray-800 -px-3 dark:text-gray-200"
              >
                <svg
                  class="w-5 h-5 mx-3"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>

                <span class="mx-3">Premium selection</span>
              </div>

              <div
                class="flex items-center text-gray-800 -px-3 dark:text-gray-200"
              >
                <svg
                  class="w-5 h-5 mx-3"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>

                <span class="mx-3">Insurance</span>
              </div>

              <div
                class="flex items-center text-gray-800 -px-3 dark:text-gray-200"
              >
                <svg
                  class="w-5 h-5 mx-3"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>

                <span class="mx-3">All legal documents</span>
              </div>

              <div
                class="flex items-center text-gray-800 -px-3 dark:text-gray-200"
              >
                <svg
                  class="w-5 h-5 mx-3"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>

                <span class="mx-3">From US glasses dealers</span>
              </div>

              <div
                class="flex items-center text-gray-800 -px-3 dark:text-gray-200"
              >
                <svg
                  class="w-5 h-5 mx-3"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>

                <span class="mx-3">Payment Security</span>
              </div>

              <div
                class="flex items-center text-gray-800 -px-3 dark:text-gray-200"
              >
                <svg
                  class="w-5 h-5 mx-3"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>

                <span class="mx-3">Fast shipping (+ Express)</span>
              </div>
            </div>
          </div>
        </div>

        <div class="flex items-center justify-center w-full h-96 lg:w-1/2">
          <img
            class="object-cover w-full h-full max-w-2xl rounded-md"
            src="https://images.unsplash.com/photo-1484591974057-265bb767ef71?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MXx8fGVufDB8fHx8&w=1000&q=80"
            alt="landscape"
          />
        </div>
      </div>
    </header>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.container {
  margin: 0 auto;
}
</style>
