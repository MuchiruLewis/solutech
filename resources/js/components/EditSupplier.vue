<template>
    <div>
        <h4 class="text-center">Edit supplier</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateSupplier">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="supplier.name">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update supplier</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            supplier: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/suppliers/edit/${this.$route.params.id}`)
                .then(response => {
                    this.supplier = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateSupplier() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/suppliers/update/${this.$route.params.id}`, this.supplier)
                    .then(response => {
                        this.$router.push({name: 'suppliers'});
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>