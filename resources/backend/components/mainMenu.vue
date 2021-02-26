<template>
    <div>
        <!-- BEGIN: Main Menu-->
        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand"
                                                    href="/html/ltr/vertical-menu-template/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Project CV</h2>
                    </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item" v-for="link in listMenu">
                        <router-link :to=link.path tag="a">
                            <i class="feather" :class=link.icon></i>
                            <span class="menu-title" :data-i18n=link.name>{{link.name}}</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Main Menu-->
    </div>
</template>

<script>
export default {
    name: "mainMenu",
    data(){
        return{
            listMenu:[]
        }
    },
   created: function (){
       console.log(this.$router.options.routes)
       this.$router.options.routes.forEach(route => {
           this.listMenu.push({
               name: route.name,
               path: route.path,
               icon: route.meta.icon
           })
       })
   }
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
