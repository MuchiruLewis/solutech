<template>
    <div>
        <h4 class="text-center">Add Product</h4>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addBook">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="book.name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="book.author">
                    </div>
                     <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" class="form-control" v-model="book.quantity">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            book: {}
        }
    },
    methods: {
        addBook() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/books/add', this.book)
                    .then(response => {
                        this.$router.push({name: 'books'})
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
