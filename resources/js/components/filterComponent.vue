<template>
    <form @submit="applyFilters" class="flex gap-9 items-end justify-end">
        <div class="form-control">
            <label class="label cursor-pointer p-0">
                <span class="label-text px-3">Solo Choice</span>
                <input
                    name="only_sponsorized"
                    type="checkbox"
                    class="toggle toggle-primary"
                    v-model="onlySponsor"
                />
            </label>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer p-0">
                <span class="label-text px-3">I più recensiti</span>
                <input
                    name="most_reviewed"
                    type="checkbox"
                    class="toggle toggle-secondary"
                    v-model="mostReviewed"

                />
            </label>
        </div>

        <div class="flex flex-col">
            <label for="rating-min">Range media recensioni</label>
            <div class="rating rating-md flex flex-row-reverse justify-center">
                <input
                    ref="ratingMin"
                    v-for="i in 5"
                    :key="i"
                    type="radio"
                    :value="5 - i + 1"
                    name="rating-min"
                    class="mask mask-star-2 bg-orange-400"
                />
            </div>
        </div>

        <button class="btn btn-md btn-accent">APPLICA</button>
    </form>
</template>

<script>
export default {
    name: "FilterComponent",
    data() {
        return {
                onlySponsor: false,
                mostReviewed: false,
                rating_min: 1,
                rating_max: 5,
        };
    },
    methods: {
        applyFilters(event) {
            event.preventDefault();
            const form = this.$refs.formMessage;
            const formData = new FormData(form);
            let filterToApply = {
                rating_min: parseInt(document.querySelector('input[name="rating-min"]:checked').value),
                rating_max: 5,
                only_sponsorized: formData.get("only_sponsorized"),
                most_reviewed: formData.get("most_reviewed"),
            };
            console.log(filterToApply);
        },
    },
    mounted() {},
};
</script>

<style></style>
