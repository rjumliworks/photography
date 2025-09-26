<template>
    <div class="card shadow-none border">
        <div class="card-header bg-light-subtle">
            <div class="d-flex mb-n3">
                <div class="flex-shrink-0 me-3">
                    <div style="height:2.5rem;width:2.5rem;">
                        <span class="avatar-title bg-primary-subtle rounded p-2 mt-n1">
                            <i class="ri-folder-2-fill text-primary fs-24"></i>
                        </span>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <h5 class="mb-0 fs-14"><span class="text-body">Quick Access</span></h5>
                    <p class="text-muted text-truncate-two-lines fs-12">
                        <span>
                           View featured folders, normal folders, and your most recently added files.
                        </span>
                    </p>
                </div>
                <div class="flex-shrink-0"></div>
            </div>
        </div>
        <div class="card-body border-bottom bg-white">
            <div class="d-flex mb-0">
                <div class="flex-shrink-0 me-3">
                    <p class="mb-0 text-primary fs-12 fw-semibold">My Folders ({{ folders.length }})</p>
                </div>
                <div class="flex-grow-1">
                    
                </div>
                <div class="flex-shrink-0">
                    <button @click="openCreate()" class="btn btn-sm btn-primary float-end" 
                    :disabled="plan.data.plan.folders_limit >= folders.length"
                    style="margin-top: -5px; margin-bottom: -5px;">
                        <i class="ri-add-circle-fill align-bottom"></i> New Folder
                    </button>
                </div>
            </div>
        </div>
        <div class="card bg-white shadow-none mb-n4" style="min-height: 200px; overflow: hidden;">
            <div class="p-4 mb-n3">
                <div class="fs-12 alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mt-n1 material-shadow" v-if="plan.data.plan.folders_limit >= folders.length" role="alert">
                    <i class="ri-error-warning-line label-icon"></i><strong>Folder creation limit reached</strong>
                    - Please remove or manage existing folders before creating new ones.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="row" id="folderlist-data">
                    <div class="col-xxl-2 col-3 folder-card" v-for="(list,index) in folders" v-bind:key="index">
                        <div class="card bg-light shadow-none" id="folder-1">
                            <div class="card-body">
                                <div class="d-flex mb-n2">
                                    <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                        <input class="form-check-input" type="checkbox" value="" id="folderlistCheckbox_1">
                                        <label class="form-check-label" for="folderlistCheckbox_1"></label>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-ghost-primary btn-icon btn-sm dropdown material-shadow-none"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                        </button>
                                        <ul class="dropdown">
                                            <ul class="dropdown-menu dropdownmenu-primary dropdown-menu-end">
                                                <li>
                                                    <Link :href="`/folders/${list.code}`" class="dropdown-item d-flex align-items-center" role="button">
                                                        <i class="ri-eye-fill me-2"></i> View
                                                    </Link>
                                                </li>
                                                <li>
                                                    <a @click="openUpdate(list,index)" class="dropdown-item d-flex align-items-center" role="button">
                                                        <i class="ri-edit-2-fill me-2"></i> Update
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" role="button">
                                                        <i class="ri-download-2-fill me-2"></i> Download
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center text-danger" href="#removeFileItemModal" data-id="1" data-bs-toggle="modal" role="button">
                                                        <i class="ri-delete-bin-6-fill me-2"></i> Move to trash
                                                    </a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <div class="mb-0">
                                        <i class="ri-folder-2-fill align-bottom text-warning display-6"></i>
                                    </div>
                                    <h6 class="fs-12 text-truncate folder-name">{{ list.name }}</h6>
                                </div>
                                <div class="hstack mt-4 text-muted fs-12">
                                    <span class="me-auto"><b>{{ list.count }}</b> Files</span>
                                    <span><b>{{ list.size }}</b></span>
                                </div>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>

        </div>
        <div class="card bg-white border-bottom shadow-none mb-0" style="height: calc(100vh - 559px); overflow: hidden;">
            <hr class="text-muted"/>
                <div class="d-flex mb-0 ms-3 me-3">
                    <div class="flex-shrink-0 me-3">
                        <p class="mb-0 text-primary fs-12 fw-semibold">Recent Uploads</p>
                    </div>
                    <div class="flex-grow-1">
                        
                    </div>
                    <div class="flex-shrink-0">
                        <!-- <button class="btn btn-sm btn-primary float-end" style="margin-top: -5px; margin-bottom: -5px;">
                            <i class="ri-add-circle-fill align-bottom"></i> New Folder
                        </button> -->
                    </div>
                </div>
            <hr class="text-muted mb-3"/>
            <div class="table-responsive table-card">
                <table class="table table-nowrap table-bordered align-middle m-0">
                    <thead class="table-light thead-fixed">
                        <tr class="fs-11">
                            <th style="width: 4%;" class="text-center">#</th>
                            <th style="width: 20%;">Name</th>
                            <th style="width: 10%;" class="text-center">File Size</th>
                            <th style="width: 10%;" class="text-center">Location</th>
                            <th style="width: 10%;" class="text-center">Last Opened</th>
                            <th style="width: 10%;" class="text-center">Date Created</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <Create ref="create"/>
</template>
<script>
import Create from '../../Folders/Modals/Create.vue';
export default {
    props: ['folders','plan'],
    components: { Create },
    data(){
        return {

        }
    },
    methods: { 
        openCreate(){
            this.$refs.create.show();
        }
    }
}
</script>