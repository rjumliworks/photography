<template>
    <b-row class="g-3">
        <div class="col-md-3">
            <Sidebar :plan="plan" ref="sidebar"/>
        </div>
        <div class="col-md-9">
            <Main ref="main"/>
        </div>
    </b-row>
</template>
<script>
import Main from './Components/Main.vue';
import Sidebar from './Components/Sidebar.vue';
export default {
    components: { Main, Sidebar },
    props: ['plan']
}
</script>