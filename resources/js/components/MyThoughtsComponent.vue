<template>
    <div class="row">
        <div class="col-md-12">
            <form-component @new="addThought"></form-component>

            <thought-component
                v-for="(thought, index) in thoughts"
                :key="thought.id"
                :thought="thought"
                @delete="deleteThought(index)"
            >
            </thought-component>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            thoughts: [],
        };
    },

    mounted() {
        axios.get("/thoughts").then((response) => {
            this.thoughts = response.data;
        });
    },

    methods: {
        addThought(thought) {
            this.thoughts.push(thought);
        },
        deleteThought(index) {
            this.thoughts.splice(index, 1);
        },
    },
};
</script>

<style>
    .btn {
        margin-left: 0.5rem;
    }
    .btn-default {
        background-color: gray;
        color: white;
    }
    .btn-default:hover {
        background-color: gray;
        color: white;
    }
    
</style>
