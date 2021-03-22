<template>
    <div>
        <h4 class="text-center">Edit Order</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateOrder">
                    <div class="form-group">
                        <label>Order No</label>
                        <input type="text" class="form-control" v-model="order.order_number">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update Order</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            order: {}
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/orders/edit/${this.$route.params.id}`)
                .then(response => {
                    this.order = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
        })
    },
    methods: {
        updateOrder() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post(`/api/orders/update/${this.$route.params.id}`, this.order)
                    .then(response => {
                        this.$router.push({name: 'orders'});
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