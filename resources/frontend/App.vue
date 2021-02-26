<template>
    <div id="app">
        <main-menu></main-menu>
        <layout-default></layout-default>
    </div>
</template>

<script>
import LayoutDefault from "./layout/LayoutDefault";
import MainMenu from "./components/mainMenu";

export default {
    name: "App",
    components: {MainMenu, LayoutDefault}
}
</script>

<style scoped>

</style>
