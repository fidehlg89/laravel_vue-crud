<template>
    <div class="card mb-2">
        <div class="card-header">
            Publicado en {{ formatDateTime(thought.created_at) }} - Última actualización:
            {{ formatDateTime(thought.updated_at) }}
        </div>

        <div class="card-body">
            <input v-if="editMode" type="text" class="form-control" v-model="thought.description"
                v-on:keyup.enter="onUpdate()" />
            <p v-else>{{ thought.description }}</p>
        </div>

        <div class="card-footer">
            <button v-if="editMode" class="btn btn-success" v-on:click="onUpdate()">
                Guardar cambios
            </button>
            <button v-else class="btn btn-default" v-on:click="onClickEdit()">
                Editar
            </button>

            <button class="btn btn-danger" v-on:click="onClickDelete()">
                Borrar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["thought"],
    data() {
        return {
            editMode: false,
        };
    },
    mounted() {
        console.log(this.thought.description);
    },
    methods: {
        formatDateTime(dateTimeString) {
            const options = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: 'numeric',
                minute: 'numeric',
                hour12: true,
            };
            return new Date(dateTimeString).toLocaleDateString('es-ES', options);
        },
        onClickDelete() {
            axios.delete(`/thoughts/${this.thought.id}`).then(() => {
                this.$emit("delete");
            });
        },
        onClickEdit() {
            this.editMode = true;
        },
        onUpdate() {
            let $id = this.thought.id;
            const params = {
                description: this.thought.description,
            };
            axios.put(`/thoughts/${$id}`, params).then((response) => {
                this.editMode = false;
                const thought = response.data;
                this.$emit("update", thought);
            });
        },
    },
};
</script>
