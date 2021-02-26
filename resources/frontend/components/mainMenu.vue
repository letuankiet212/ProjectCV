<template>
    <div id="nav">
        <router-link to="/">Home</router-link>
        <router-link to="/about">About</router-link>
        <router-link to="/about/new">New</router-link>
    </div>
</template>

<script>
export default {
name: "mainMenu"
}
</script>

<style scoped>

#app {
    color: #2c3e50;
}

#nav {
    padding: 30px
}

#nav a {
    font-weight: bold;
    color: #2c3e50;
}

#nav a.active {
    color: #42b983;
}
</style>
