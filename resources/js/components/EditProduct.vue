<template>
    <div class="edit-section">
        <h3 class="text-center">Edit Product</h3>
        <div class="row">
            <div class="col-md-6 body-section">
                <form @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Manufactured Year</label>
                        <input type="number" class="form-control" v-model="product.manufactured_year">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {
            this.axios
                .get(`http://127.0.0.1:8000/api/product/edit/${this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data;
                });
        },
        methods: {
            updateProduct() {
                this.axios
                    .post(`http://127.0.0.1:8000/api/product/update/${this.$route.params.id}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>

<style scoped>
.edit-section{
    border: 1px solid grey;
    margin: 0 auto;
}

.body-section{
    padding: 8px;
    margin: 0 auto;
}
</style>