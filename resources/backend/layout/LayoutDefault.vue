<template>
    <div>
        <div class="content-body">
            <router-view :alert=alert @updateAlert=updateAlert></router-view>
            <div class="toast-bs-container">
                <div class="toast-position">
                    <div class="toast fade " role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000"
                         :class=" infoAlert.status ? 'show' : 'hiden'" style="z-index: 99999">
                        <div class="toast-header">
                            <img src="http://127.0.0.1:8000/backend/app-assets/images/logo/logo.png"
                                 class="rounded mr-2" alt="Toast Image">
                            <strong class="mr-auto">{{infoAlert.title}}</strong>
                            <small class="text-muted">2 seconds ago</small>
                            <button type="button" class="ml-1 close" data-dismiss="toast" aria-label="Close"
                                    @click="Close()">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            {{infoAlert.msg}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    name: "LayoutDefault",
    data() {
        return {
            alert: 'Hello',
            infoAlert: {}
        }
    },
    methods: {
        updateAlert(e) {
            this.infoAlert = e
            setTimeout(() => this.infoAlert.status = false, 5000);
        },
        Close() {
            this.infoAlert.status= false
        }
    }
}
</script>

<style scoped>

</style>
