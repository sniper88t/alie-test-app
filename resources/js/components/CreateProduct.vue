<template>
    <div class="create-section">
        <h3 class="text-center">Create Product</h3>
        <div class="row">
            <div class="col-md-6 body-section">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label>Manufactured Year</label>
                        <input type="text" class="form-control" v-model="product.manufactured_year">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                <div class="upload-file">
                    <div v-if="success != ''" class="alert alert-success">
                        {{success}}
                    </div>
                    <form @submit="formSubmit" enctype="multipart/form-data">
                        <input type="file" class="form-control" v-on:change="onChange">
                        <button class="btn btn-primary btn-block">Upload</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                product: {},
                name: '',
                file: '',
                success: ''
            }
        },
        methods: {
            addProduct() {
                this.axios
                    .post('http://127.0.0.1:8000/api/product/add', this.product)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            },

            onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                let data = new FormData();
                data.append('file', this.file);

                axios.post('/upload', data, config)
                    .then(function (res) {
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>


<style scoped>
.create-section{
    border: 1px solid grey;
    margin: 0 auto;
}

.body-section{
    padding: 8px;
    margin: 0 auto;
}

.upload-file{
  margin-top:24px;
}
</style>