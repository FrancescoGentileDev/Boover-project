<template>
  <main>
    <section class="jumbo"></section>

    <section class="team"></section>















































    
    <section class="description"></section>
    <section class="information"></section>
    <section class="review"></section>

    <!--Q&A-->
    <section class="qa bg-info-content py-5 ">
        <div class="text-center">
         <h1 class="">Q&A</h1>    
        </div>
        <!--Q&A CONTAINER-->
     <div class="container mx-auto md:h-80"> 

        <!--Q&A BOX-->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full ">


             <div v-for="(faq,index) in faqs" :key="index">                
                  <div   tabindex="0" class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box">
                   <div class="collapse-title text-xl font-medium">
                          {{faq.question}}
                    </div>
                    <div class="collapse-content"> 
                      <p>{{faq.answer}}</p>
                    </div>
                 </div>
             </div>
                
             

             <!--Q&A BOX-->     
          
            
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
        faqs:[
            {
                question:"Question1",
                answer:"Answer1"
            },
            {
                question:"Question2",
                answer:"Answer2"
            },
            {
                question:"Question3",
                answer:"Answer3"
            },
            {
                question:"Question4",
                answer:"Answer4"
            },
            {
                question:"Question5",
                answer:"Answer5"
            },
            {
                question:"Question6",
                answer:"Answer6"
            },
        ]

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
