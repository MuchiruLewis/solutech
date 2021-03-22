<template>
    <div>
        <h4 class="text-center">Add Order</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addOrder">
                    <div class="form-group">
                        <label>Order_no</label>
                        <input type="text" class="form-control" v-model="order.order_number">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Add Order</button>
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
    methods: {
        addOrder() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/orders/add', this.order)
                    .then(response => {
                        this.$router.push({name: 'orders'})
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