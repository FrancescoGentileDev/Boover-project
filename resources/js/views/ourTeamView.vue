<template>
  <main>
    <section class="jumbo"></section>
    <section class="team"></section>
    <section class="description"></section>
    <section class="information"></section>
    <section class="review"></section>

    <!--Q&A-->
    <section class="qa bg-blue-700">
        <div class="text-center">
         <h1>Q&A</h1>    
        </div>
        <div>
            <div>
                <div class="bg-primary-content"><strong>Text</strong></div>
                <div class="bg-primary-content"><strong>Text</strong></div>
                <div class="bg-primary-content"><strong>Text</strong></div>
            </div>
            <div>
                <div class="bg-primary-content"><strong>Text</strong></div>
                <div class="bg-primary-content"><strong>Text</strong></div>
                <div class="bg-primary-content"><strong>Text</strong></div>
            </div>
        </div>

    </section>

    <!--REGISTER-->
    <section class="register">
      <div class="text-center">
        <h1 class=" pt-10"><strong>Registrati e inizia oggi a ricevere clienti</strong></h1>
        <button class="btn btn-primary m-3">Sign up</button>
     </div>
    </section>
  </main>
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
