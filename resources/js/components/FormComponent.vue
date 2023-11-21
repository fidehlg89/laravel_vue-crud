<template>
    <div class="card mb-2">
        <div class="card-header">¿En qué estás pensando ahora?</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newThought()">
                <div class="form-group">
                    <textarea placeholder="Escribe aquí tus pensamientos" type="text" class="form-control rounded-1" rows="4"
                        name="thought" v-model="description" />
                </div>
                <div class="mt-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary m-0 rounded-5">
                        Listo
                    </button>
                </div>

            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            description: "",
        };
    },
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        newThought() {
            const params = {
                description: this.description,
            };
            this.description = "";

            axios.post("/thoughts", params).then((response) => {
                const thought = response.data;
                this.$emit("new", thought);
            });
        },
    },
};
</script>
