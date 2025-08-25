<template>
    <b-modal v-model="showModal" style="--vz-modal-width: 600px;" header-class="p-3 bg-light" title="New Folder" class="v-modal-custom" modal-class="zoomIn" centered no-close-on-backdrop>
        <form class="customform">
            <BRow class="g-3 p-2 mb-n4">
                <BCol lg="12" class="mt-2">
                    <InputLabel for="name" value="Name" :message="form.errors.name"/>
                    <TextInput id="name" v-model="form.name" type="text" class="form-control" placeholder="Please enter name" @input="handleInput('name')" :light="true"/>
                </BCol>
                <BCol lg="12" class="mt-0">
                    <InputLabel for="name" value="Description" :message="form.errors.name"/>
                    <Textarea id="name" v-model="form.description" rows="3" type="text" class="form-control" placeholder="Please enter description" @input="handleInput('description')" :light="true"/>
                </BCol>
                <BCol lg="12">
                    <div class="d-flex align-items-center">
                        <div class="form-check form-switch form-switch-success form-switch-md mb-0">
                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd" v-model="form.is_public">
                        </div>
                        <label class="form-check-label ms-2 mt-n1 mb-0" for="customSwitchsizemd">Make this folder public</label>
                    </div>
                </BCol>
            </BRow>
        </form> 
        <template v-slot:footer>
            <b-button @click="hide()" variant="light" block>Cancel</b-button>
            <b-button @click="submit('ok')" variant="primary" :disabled="form.processing" block>Submit</b-button>
        </template>
    </b-modal>
</template>
<script>
import _ from 'lodash';
import { useForm } from '@inertiajs/vue3';
import Multiselect from "@vueform/multiselect";
import InputLabel from '@/Shared/Components/Forms/InputLabel.vue';
import TextInput from '@/Shared/Components/Forms/TextInput.vue';
import Textarea from '@/Shared/Components/Forms/Textarea.vue';
export default {
    components: { Multiselect, InputLabel, TextInput, Textarea },
    data(){
        return {
            currentUrl: window.location.origin,
            form: useForm({
                id: null,
                name: null,
                description: null,
                is_public: false,
                is_protected: false,
                option: 'folder'
            }),
            showModal: false
        }
    },
    methods: { 
        show(){
            this.editable = false;
            this.form.reset();
            this.showModal = true;
        },
        edit(data){
            this.form.id = data.id;
            this.form.name = data.name;
            this.form.description = data.description;
            this.form.is_public = data.is_public;
            this.editable = true;
            this.showModal = true;
        },
        submit(){
            if(this.editable){
                this.form.put('/folders/update',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.$emit('update',this.$page.props.flash.data.data);
                        this.form.clearErrors();
                        this.form.reset();
                        this.hide();
                    },
                });
            }else{
                this.form.post('/folders',{
                    preserveScroll: true,
                    onSuccess: (response) => {
                        this.$emit('success',true);
                        this.form.clearErrors();
                        this.form.reset();
                        this.hide();
                    },
                });
            }
        },
        handleInput(field) {
            this.form.errors[field] = false;
        },
        hide(){
            this.showModal = false;
        }
    }
}
</script>