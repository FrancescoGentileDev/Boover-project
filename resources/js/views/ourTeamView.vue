<template>
  <main>
    <section class="jumbo"> 
    </section>





































    <section class="team"></section>















































    
    <section class="description"></section>
    <section class="information"></section>
    
                                 
                                         
                                         <!--REVIEW-->
<section class="bg-base-200 dark:bg-gray-900"> 
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">
            What our <span class="text-secondary">clients</span> say
        </h1>

        <p class="max-w-2xl mx-auto mt-6 text-center text-gray-500 dark:text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error
            alias, adipisci rem similique, at omnis eligendi optio eos harum.
        </p>
       <div class="grid grid-cols-1 gap-8 mx-auto mt-8 lg:grid-cols-2 xl:mt-10 max-w-7xl">
           <div v-for="(reviews,index) in reviews" :key="index" >
               <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800 md:p-8">
                   <p class="leading-loose text-gray-500 dark:text-gray-300">
                       “{{reviews.review}}”.
                   </p>

                   <div class="flex items-center mt-6">
                       <img class="object-cover rounded-full w-14 h-14" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                    
                       <div class="mx-4">
                           <h1 class="font-semibold text-secondary">{{reviews.userName}}</h1>
                           <span class="text-sm text-gray-500 dark:text-gray-300">{{reviews.profession}}</span>
                       </div>
                   </div>
               </div>            
           </div>
       </div>
    </div>
</section>








    <!--Q&A-->
    <section class="qa bg-base-200 py-5 ">
        <div class="text-center">
         <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl py-10">Q&A</h1>    
        </div>
        <!--Q&A CONTAINER-->
     <div class="container mx-auto md:h-80">         
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full ">
                                   <!--Q&A BOX-->
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
        </div>
     </div>
    </section>
    <!--REGISTER-->
    <section class="register py-20">
      <div class="text-center">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl pt-10">Registrati e inizia oggi a ricevere clienti</h1>
        <button class="btn btn-primary m-3 mt-20">Sign up</button>
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
                answer:"Hidden answer showed at click."
            },
            {
                question:"Question2",
                answer:"Hidden answer showed at click."
            },
            {
                question:"Question3",
                answer:"Hidden answer showed at click."
            },
            {
                question:"Question4",
                answer:"Hidden answer showed at click."
            },
            {
                question:"Question5",
                answer:"Hidden answer showed at click."
            },
            {
                question:"Question6",
                answer:"Hidden answer showed at click."
            },
        ],
        reviews:[
            {
                review:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, quam. Odio voluptatem officiis eos illo! Pariatur, totam alias. Beatae accusamus earum quos obcaecati minima molestias. Possimus minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?",
                propic:"image",
                userName:"Name Surname",
                profession:"Professional",
            },
            {
                review:"Lorem ipsum dolor sit amet, consectetur abo? Architecto, unde laboriosam?",
                propic:"image",
                userName:"Tizio Di Caio",
                profession:"Researcher",
            },
            {
                review:"Lorem ipsum dolor sit amet,Aperiam, quam. Odio voluptatas. Possimus minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?",
                propic:"image",
                userName:"Caio Di Tizio",
                profession:"Developer",
            },
            {
                review:"Lorem ipsum dolor sit amet, voluptatem officiis eos illo! Pariatur, totam alias. Beatae accusamus earum quos obcaecati minima molestias. Possimus minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?",
                propic:"image",
                userName:"Mario Rossi",
                profession:"Student",
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
