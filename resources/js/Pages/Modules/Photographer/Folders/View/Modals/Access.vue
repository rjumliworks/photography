<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 600px;" header-class="p-3 bg-light" title="Access" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 p-2 mb-n4">
                <BCol lg="12" class="mt-2 mb-3">
                    <Search :id="id" @add="updateList"/>
                </BCol>
                <BCol lg="12" class="mb-4 mt-1" v-if="owner">
                    <h5 class="fs-15 mb-3">People with Access</h5>
                    <ul class="list-group">
                        <li class="list-group-item p-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-xs">
                                    <span class="avatar-title bg-light p-1 rounded-circle">
                                        <img :src="owner.avatar" alt="" class="avatar-xs rounded-circle">
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h6 class="mb-0 fs-12">{{owner.name}} <span v-if="$page.props.user.data.name == owner.name" class="text-muted fs-11">(you)</span></h6>
                                    <p class="fs-11 mb-0 text-muted">{{ owner.email }}</p>
                                </div>
                                <div class="flex-shrink-0 text-end">
                                    <h6 class="text-muted mt-2 me-2 fs-12">Owner</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item p-3" v-if="share">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-xs">
                                    <span class="avatar-title bg-light p-1 rounded-circle">
                                        <img :src="'/storage/'+share.avatar" alt="" class="avatar-xs rounded-circle">
                                    </span>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <h6 class="mb-0 fs-12">{{share.name}} <span v-if="$page.props.user.data.name == share.name" class="text-muted fs-11">(you)</span></h6>
                                    <p class="fs-11 mb-0 text-muted">{{ share.email }}</p>
                                </div>
                                <div class="flex-shrink-0 text-end">
                                    <h6 class="text-muted mt-2 me-2 fs-12">Viewer</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </BCol>
            </BRow>
        </form> 
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Close</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import Search from './Search.vue';
export default {
    components: { Search },
    data(){
        return {
            currentUrl: window.location.origin,
            owner: null,
            share: null,
            id: null,
            showModal: false
        }
    },
    methods: { 
        show(id,owner){
            this.id = id;
            this.owner = owner;
            this.showModal = true;
        },
        updateList(data){
            this.share = data;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>