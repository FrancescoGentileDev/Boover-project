<template>
  <main>
    <section class="jumbo"></section>
    <section class="team"></section>
    <section class="description"></section>
    <section class="information"></section>
    <section class="review"></section>
    <section class="q&a"></section>
    <section class="register">
        <h1 class="pt-10"><strong>Registrati e inizia oggi a ricevere clienti</strong></h1>

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
