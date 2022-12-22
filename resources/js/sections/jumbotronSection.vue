<template>
    <div class="wrapper pt-24 pb-24">
        <div
            class="bg-primary flex justify-center align-center m-auto w-11/12 p-24 relative rounded-md bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 .."
        >
            <!-- // -->
            <div class="">
                <h1 class="text-5xl w-full lg:w-3/4 font-normal text-white">
                    Cerca il
                    <span class="font-bold">professionista</span> di cui hai
                    bisogno per far crescere il tuo<span class="font-extrabold">
                        business.</span
                    >
                </h1>
                <button class="btn btn-secondary mt-4">Get Started</button>
            </div>
            <!-- // -->
            <div class="lg:w-4/6">
                <img
                    src="https://res.cloudinary.com/dflyrzhj9/image/upload/v1671149669/waist-up-shot-attractive-young-girlfriend-with-dark-straight-hair-soft-healthy-skin_k1xjd7.png"
                    alt=""
                    class="invisible lg:visible absolute bottom-0 right-0"
                />
            </div>
            <!-- // -->
        </div>
    </div>
</template>

<script>
export default {
    name: "jumbotronSection",
    //
    data() {
        return {
            pics: [
                /*   "https://images.pexels.com/photos/5407215/pexels-photo-5407215.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1", */
            ],
        };
    },
};
</script>

<style></style>
