<template>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card" style="height: 318.333px;">
                    <div class="card-header">
                        <h4 class="card-title">Thông tin cơ bản</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" v-on:submit.prevent="onSubmit">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Name</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" class="form-control" name="name"
                                                           placeholder="Name" v-model="infoBasic.name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Quick Text</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="qtext" class="form-control"
                                                           name="qtext" placeholder="Quick Text" v-model="infoBasic.qtext">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Link CV</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="linkcv" class="form-control"
                                                           name="linkcv" placeholder="Link CV" v-model="infoBasic.linkcv">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit"
                                                    class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Cập Nhật
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
export default {
    name: "index",
    props:[alert],
    data() {
        return {
            infoBasic:[]
        }
    },
    created() {

        axios.get('/api/index').then(response => {
            this.infoBasic = response.data.data[0]
        })
    },

    methods:{
        onSubmit(){
            axios.post('/api/update/'+this.infoBasic.id,this.infoBasic).then(response => {
                if (response.status = 200){
                    this.$emit('updateAlert',{title:'Thành Công',msg:'Đã cập nhật thành công',status:true})
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
