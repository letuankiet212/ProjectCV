<template>
    <!-- Data list view starts -->
    <section id="data-list-view" class="data-list-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">

            </div>
        </div>

        <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="top">
                    <div class="actions action-btns">
                        <div class="dt-buttons btn-group">
                            <button class="btn btn-outline-primary" tabindex="0"
                                    aria-controls="DataTables_Table_0" @click="Create()">
                                <span><i class="feather icon-plus"></i> Add New</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <table class="table data-list-view dataTable no-footer dt-checkboxes-select" id="DataTables_Table_0"
                       role="grid">
                    <thead>
                    <tr role="row">
                        <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" tabindex="0"
                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 64.4444px;"
                            data-col="0" aria-label=""><input type="checkbox"></th>
                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="NAME: activate to sort column descending"
                            style="width: 729.462px;">NAME
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="CATEGORY: activate to sort column ascending" style="width: 182.795px;">
                            CATEGORY
                        </th>

                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="ORDER STATUS: activate to sort column ascending" style="width: 205.017px;">
                            DOMAIN
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="COMPANY STATUS: activate to sort column ascending" style="width: 205.017px;">
                            COMPANY
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="PRICE: activate to sort column ascending" style="width: 149.462px;">DATE
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            aria-label="ACTION: activate to sort column ascending" style="width: 116.128px;">ACTION
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr role="row" v-for="(info,index) in infoPortfolio" :key="index"
                        :class="info.checked ? 'selected' : ''">
                        <td class="dt-checkboxes-cell">
                            <input type="checkbox" class="dt-checkboxes">
                        </td>
                        <td class="product-name sorting_1"> {{ info.name }}</td>
                        <td class="product-category">{{ info.category }}</td>
                        <td>
                            <div class="chip chip-danger">
                                <div class="chip-body">
                                    <div class="chip-text">{{ info.domain }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="product-compony">{{ info.company }}</td>
                        <td class="product-date">{{ info.date }}</td>
                        <td class="product-action">
                             <span class="action-delete" @click="Detail(info,index)">
                                <i class="feather icon-edit"></i>
                            </span>
                            <span class="action-delete" @click="Del(info.id,index)">
                                <i class="feather icon-trash"></i>
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- add new sidebar starts -->
        <div class="add-new-data-sidebar">
            <div class="overlay-bg" :class="openPopup.status ? 'show' : ''" @click=Close()></div>
            <div class="add-new-data" :class="openPopup.status ? 'show' : ''">
                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                    <div>
                        <h4 class="text-uppercase" v-if="openPopup.type === 'edit'">{{ portfolioDetail.name }}</h4>
                        <h4 class="text-uppercase" v-else>Add New</h4>
                    </div>
                    <div class="hide-data-sidebar">
                        <i class="feather icon-x" @click=Close()></i>
                    </div>
                </div>
                <div class="data-items pb-3 ps ps--active-y">
                    <div class="data-fields px-2 mt-3">
                        <div class="row">
                            <div class="col-sm-12 data-field-col">
                                <label for="data-name">Tên dự án</label>
                                <input type="text" class="form-control" id="data-name" v-model=portfolioDetail.name>
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-category"> Category </label>
                                <select class="form-control" id="data-category" v-model=portfolioDetail.category>
                                    <option>HTML5</option>
                                    <option>VueJS</option>
                                </select>
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-domain">Domain</label>
                                <input type="text" class="form-control" id="data-domain" v-model=portfolioDetail.domain>
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-company">Domain</label>
                                <input type="text" class="form-control" id="data-company"
                                       v-model=portfolioDetail.company>
                            </div>
                            <div class="col-sm-12 data-field-col">
                                <label for="data-date">Date</label>
                                <input type="date" class="form-control" id="data-date" v-model=portfolioDetail.date>
                            </div>
                            <div class="col-sm-12 data-field-col data-list-upload" v-if="openPopup.type === 'new'">
                                <form action="#" class="dropzone dropzone-area dz-clickable" id="dataListUpload">
                                    <div class="dz-message">Upload Image
                                        <input type="file" accept="image/*,.png,.jpg"
                                               style="opacity: 0;width: 100%;height: 100%;" @change=previewFiles>

                                        <img :src=portfolioDetail.img>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-12 data-field-col data-list-upload" v-else>
                                <label for="data-img">Images</label>
                                <input type="text" class="form-control" id="data-img" v-model=portfolioDetail.img>
                                <img :src=portfolioDetail.img alt="" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; height: 402px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 264px;"></div>
                    </div>
                </div>
                <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                    <div class="add-data-btn">
                        <button class="btn btn-primary waves-effect waves-light" @click="Add()"
                                v-if="openPopup.type === 'new'">Add
                        </button>
                        <button class="btn btn-primary waves-effect waves-light" @click="Update()" v-else>Update
                        </button>
                    </div>
                    <div class="cancel-data-btn">
                        <button class="btn btn-outline-danger waves-effect waves-light" @click="Close()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";

export default {
    name: "index",
    data() {
        return {
            infoPortfolio: [],
            portfolioDetail: {},
            openPopup: {status: false, type: ''},
            checkSelect: {
                status: false
            }
        }
    },
    created() {
        axios.get('/api/portfolio/index').then(response => {
            this.infoPortfolio = response.data.data
        })
    },
    methods: {
        Create() {
            this.portfolioDetail = {}
            this.openPopup.status = true
            this.openPopup.type = "new"
        },
        Add() {
            console.log(this.portfolioDetail.length)

            const formData = new FormData()
            formData.set('category', this.portfolioDetail.category)
            formData.set('company', this.portfolioDetail.company)
            formData.set('date', this.portfolioDetail.date)
            formData.set('domain', this.portfolioDetail.domain)
            formData.set('name', this.portfolioDetail.name)
            formData.set('img', this.portfolioDetail.img)
            axios.post('/api/portfolio/store/', formData).then(response => {
                this.$emit('updateAlert', {title: 'Thành Công', msg: 'Đã tạo thành công', status: true})
                if (response.status == 200) {
                    this.infoPortfolio = response.data.data
                }
            })
        },
        Del(e, index) {
            if (confirm('Bạn có chắc chắn muốn xóa ?')) {
                axios.post('/api/portfolio/del/' + e).then(response => {
                    this.$emit('updateAlert', {title: 'Thành Công', msg: 'Đã xóa thành công', status: true})
                    if (response.status == 200) {
                        console.log(index)
                        this.infoPortfolio.splice(index, 1)
                    }
                })
            }

        },
        Update() {
            axios.post('/api/portfolio/update/' + this.portfolioDetail.id, this.portfolioDetail).then(response => {
                if (response.status == 200) {
                    this.$emit('updateAlert', {title: 'Thành Công', msg: 'Chỉnh sửa thành công', status: true})
                    this.infoPortfolio = response.data.data
                }
            })
        },
        Detail(e) {
            this.openPopup.status = true
            this.openPopup.type = 'edit'
            this.portfolioDetail = e

        },
        Close() {
            this.openPopup.status = false
        },
        previewFiles(e) {
            this.portfolioDetail.img = e.target.files[0]
        }

    },
    computed: {}
}
</script>

<style scoped>

</style>
