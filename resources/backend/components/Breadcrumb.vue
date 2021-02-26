<template>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{ this.$route.name }}</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li v-for="link in listTree" class="breadcrumb-item">
                                <router-link tag="a" :to=link.path>
                                    {{link.name}}
                                </router-link>
                            </li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Breadcrumb",
    data() {
        return {
            listTree: []
        }
    },
    methods: {
        getRoute() {
            this.listTree = this.$route.matched
        }

    },
    watch: {
        $route(){
            this.getRoute()

        }
    },
    created() {
        this.getRoute();
    }


}
</script>

<style scoped>

</style>
