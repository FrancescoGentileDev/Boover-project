<template>
    <div
        class="rating px-2"
        @mousedown="startSelection"
        @mouseup="endSelection"
        @mouseover="setRating"
        @selectstart="preventSelection"
        @touchstart="startSelection"
        @touchend="endSelection"
        @touchmove="setRating"
    >
        <em
            v-for="i in 5"
            :key="i"
            :class="{ rated: i <= maxRating && i >= minRating }"
            class="fa fa-star text-4xl"
        ></em>
    </div>
</template>

<script>
export default {
    data() {
        return {
            rating: 0,
            minRating: 1,
            maxRating: 5,
            selectedStar: 0,
            disabled: false,
        };
    },
    methods: {
        startSelection(event) {
            if (this.disabled) return;

            // Determine the position of the touch or mouse event
            let x;
            let offset;
            if (event.type === "touchstart") {
                offset = event.currentTarget.getBoundingClientRect();
                x = event.touches[0].clientX - offset.left;
            } else {
                offset = event.currentTarget.getBoundingClientRect();
                x = event.clientX - offset.left;
            }

            const starWidth = event.target.offsetWidth;
            const numStars = Math.ceil(x / starWidth);
            console.log(starWidth, event.target.offsetWidth);
            this.minRating = numStars;
            this.maxRating = numStars;
            this.selectedStar = numStars;
        },
        setRating(event) {
            if (this.disabled || this.selectedStar === 0) return;

            // Determine the position of the touch or mouse event
            let x;
            if (event.type === "touchmove") {
                const offset = event.currentTarget.getBoundingClientRect();
                x = event.touches[0].clientX - offset.left;
            } else {
                const offset = event.currentTarget.getBoundingClientRect();
                x = event.clientX - offset.left;
            }

            // Calculate the number of stars to select based on the position of the touch or mouse event
            const starWidth = event.target.offsetWidth;
            const numStars = Math.ceil(x / starWidth);

            if (numStars > this.selectedStar) {
                this.maxRating = numStars;
            } else if (numStars < this.selectedStar) {
                this.minRating = numStars;
            }
             if(this.minRating< 1) {
                this.minRating = 1;
            }
            if(this.maxRating > 5) {
                this.maxRating = 5;
            }
        },
        endSelection() {
            if (this.minRating !== this.maxRating) {
                this.rating = this.maxRating;
            }
            if(this.maxRating < 1 || this.minRating < 1) {
              this.maxRating = 1;
                this.minRating = 1;
            }
            if(this.maxRating > 5 || this.minRating > 5) {
                this.maxRating = 5;
                this.minRating = 5;
            }

            this.selectedStar = 0;
            this.$emit("ratingRange", {maxRating: this.maxRating, minRating: this.minRating});
        },
        resetRating() {
            if (this.disabled) return;

            this.minRating = 0;
            this.maxRating = 0;
        },
        preventSelection(event) {
            event.preventDefault();
        },
    },
};
</script>

<style lang="scss" scoped>
.rating {
    color: #ccc; /* colore delle stelle non selezionate */
    cursor: pointer; /* cursor del mouse cambia in "pointer" quando si passa sopra alle stelle */
    transition: all 0.2s ease-in-out;
}
.rated {
    color: #ffc107; /* colore delle stelle selezionate */
    animation: rated 0.2s ease-in-out;
}

@keyframes rated{
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
}
</style>
