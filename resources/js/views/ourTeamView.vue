<template>
  <main>
    <section class="jumbo"> 
    </section>





































    <section class="team"></section>















































    
    <section class="description"></section>
    <section class="information"></section>
    <section class="review"></section>



                                   <!--REVIEW TEMPLATE 1-->


    <section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">
            What clients saying
        </h1>

        <div class="flex justify-center mx-auto mt-6">
            <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
            <span class="inline-block w-3 h-1 mx-1 bg-blue-500 rounded-full"></span>
            <span class="inline-block w-1 h-1 bg-blue-500 rounded-full"></span>
        </div>

        <div class="flex items-start max-w-6xl mx-auto mt-16">
            <button title="left arrow" class="hidden p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div>
                <p class="flex items-center text-center text-gray-500 lg:mx-8">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, quam. Odio voluptatem officiis
                    eos illo! Pariatur, totam alias. Beatae accusamus earum quos obcaecati minima molestias. Possimus
                    minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates
                    fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis
                    quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?
                </p>

                <div class="flex flex-col items-center justify-center mt-8">
                    <img class="object-cover rounded-full w-14 h-14" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                    <div class="mt-4 text-center">
                        <h1 class="font-semibold text-gray-800 dark:text-white">Mia Brown</h1>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Marketer</span>
                    </div>
                </div>
            </div>

            <button title="right arrow" class="hidden p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>




                                    <!--REVIEW USING V-FOR 1-->



<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">
            Cosa dicono i nostri clienti
        </h1>

        

        <div class="flex items-start max-w-6xl mx-auto mt-16">
            <button title="left arrow" class="hidden p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div v-for="(reviews,index) in reviews" :key="index">
                <p class="flex items-center text-center text-gray-500 lg:mx-8">
                    {{reviews.review}}
                </p>

                <div class="flex flex-col items-center justify-center mt-8">
                    <img class="object-cover rounded-full w-14 h-14" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                    <div class="mt-4 text-center">
                        <h1 class="font-semibold text-gray-800 dark:text-white">{{reviews.userName}}</h1>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{reviews.profession}}</span>
                    </div>
                </div>
            </div>

            <button title="right arrow" class="hidden p-2 text-gray-800 transition-colors duration-300 border rounded-full rtl:-scale-x-100 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 lg:block hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>



                                          <!--REVIEW TEMPLATE 2-->

<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">
            What our <span class="text-blue-500 ">clients</span> say
        </h1>

        <p class="max-w-2xl mx-auto mt-6 text-center text-gray-500 dark:text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error
            alias, adipisci rem similique, at omnis eligendi optio eos harum.
        </p>

        <div class="grid grid-cols-1 gap-8 mx-auto mt-8 lg:grid-cols-2 xl:mt-10 max-w-7xl">
            <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800 md:p-8">
                <p class="leading-loose text-gray-500 dark:text-gray-300">
                    “Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quibusdam ducimus libero ad tempora doloribus expedita laborum saepe voluptas perferendis delectus assumenda rerum, culpa aperiam dolorum, obcaecati corrupti aspernatur a.”.
                </p>

                <div class="flex items-center mt-6">
                    <img class="object-cover rounded-full w-14 h-14" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                    
                    <div class="mx-4">
                        <h1 class="font-semibold text-blue-500">Robbert</h1>
                        <span class="text-sm text-gray-500 dark:text-gray-300">CTO, Robert Consultency</span>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800 md:p-8">
                <p class="leading-loose text-gray-500 dark:text-gray-300">
                    “Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quibusdam ducimus libero ad tempora doloribus expedita laborum saepe voluptas perferendis delectus assumenda rerum, culpa aperiam dolorum, obcaecati corrupti aspernatur a.”.
                </p>

                <div class="flex items-center mt-6">
                    <img class="object-cover rounded-full w-14 h-14" src="https://images.unsplash.com/photo-1499470932971-a90681ce8530?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                    
                    <div class="mx-4">
                        <h1 class="font-semibold text-blue-500">Mia Brown</h1>
                        <span class="text-sm text-gray-500 dark:text-gray-300">Marketing Manager at Stech</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                                         <!--REVIEW CUSTOM 2-->
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-gray-800 capitalize lg:text-4xl dark:text-white">
            What our <span class="text-blue-500 ">clients</span> say
        </h1>

        <p class="max-w-2xl mx-auto mt-6 text-center text-gray-500 dark:text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error
            alias, adipisci rem similique, at omnis eligendi optio eos harum.
        </p>

        <div v-for="(reviews,index) in reviews" :key="index" class="grid grid-cols-1 gap-8 mx-auto mt-8 lg:grid-cols-2 xl:mt-10 max-w-7xl">
            <div class="p-6 bg-gray-100 rounded-lg dark:bg-gray-800 md:p-8">
                <p class="leading-loose text-gray-500 dark:text-gray-300">
                    “Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quibusdam ducimus libero ad tempora doloribus expedita laborum saepe voluptas perferendis delectus assumenda rerum, culpa aperiam dolorum, obcaecati corrupti aspernatur a.”.
                </p>

                <div class="flex items-center mt-6">
                    <img class="object-cover rounded-full w-14 h-14" src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                    
                    <div class="mx-4">
                        <h1 class="font-semibold text-blue-500">Robbert</h1>
                        <span class="text-sm text-gray-500 dark:text-gray-300">{{reviews.profession}}, {{reviews.userName}}</span>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>








    <!--Q&A-->
    <section class="qa bg-info-content py-5 ">
        <div class="text-center">
         <h1 class="">Q&A</h1>    
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
                review:"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, quam. Odio voluptatem officiis eos illo! Pariatur, totam alias. Beatae accusamus earum quos obcaecati minima molestias. Possimus minima dolores itaque! Esse! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea voluptates fugiat corrupti laudantium dolores reiciendis pariatur esse quod nihil quia cupiditate debitis quisquam nemo, accusamus animi explicabo? Architecto, unde laboriosam?",
                propic:"image",
                userName:"Name Surname",
                profession:"Professional",
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
