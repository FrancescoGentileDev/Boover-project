<template>
  <main>
    <section class="jumbo"></section>
    <section class="team"></section>
    <section class="description"></section>
    <section class="information"></section>
    <section class="review"></section>

    <!--Q&A-->
    <section class="qa bg-info-content py-5">
        <div class="text-center">
         <h1 class="">Q&A</h1>    
        </div>
        <div class="flex flex-row flex-wrap space-x-4">
            <div class="basis-1/4">            
                <div>
                  <div tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
                   <div class="collapse-title text-xl font-medium">
                          Question?
                    </div>
                    <div class="collapse-content"> 
                      <p>Hidden answer showed at click</p>
                    </div>
                 </div>
                 </div>
             </div>

          <div>
            <div class="basis-1/4">
                <div tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
                 <div class="collapse-title text-xl font-medium">
                        Question?2
                  </div>
                  <div class="collapse-content"> 
                    <p>Hidden answer showed at click</p>
                  </div>
                </div>
            </div>
          </div> 

          <div>
            <div class="basis-1/4">
                <div tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
                 <div class="collapse-title text-xl font-medium">
                        Question?3
                  </div>
                  <div class="collapse-content"> 
                    <p>Hidden answer showed at click</p>
                  </div>
                </div>
            </div>
          </div> 

          <div>
            <div class="basis-1/4">
                <div tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
                 <div class="collapse-title text-xl font-medium">
                        Question?4
                  </div>
                  <div class="collapse-content"> 
                    <p>Hidden answer showed at click</p>
                  </div>
                </div>
            </div>
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
