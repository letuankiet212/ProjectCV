<template>
    <div id="app">
        <Header></Header>
        <main-menu></main-menu>
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <breadcrumb></breadcrumb>
                <layout-default></layout-default>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutDefault from "./layout/LayoutDefault";
import MainMenu from "./components/mainMenu";
import Header from "./components/Header";
import Breadcrumb from "./components/Breadcrumb";

export default {
    name: "App",
    components: {Breadcrumb, Header, MainMenu, LayoutDefault}
}
</script>

<style scoped>

</style>
