<template>
    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Products List</router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Product</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>

<style scoped>
.navbar-nav{
    border: 3px solid;
  color: #fff;
  background: #444;
  margin: 0 auto;
  
}
.navbar-nav .nav-link{
    font-size: 20px;
    color: white;
    font:bold;
}
</style>