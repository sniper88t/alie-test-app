<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><p class="text-success">Wecome to My test App(Alie-test-app)</p></div>

                    <div class="card-body">
                        <p>Built by Alie (2021-09-01) </p>
                        <p>Login please...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="css" scoped>

.card-header p{
    color: green;
    font-size: 26px;
}
.card-body p{
    color: blue;
    font-size: 18px;
    text-align: center;
}

.card-body p:nth-child(1){
    color: red;
    font-size: 18px;
    text-align: center;
}
</style>