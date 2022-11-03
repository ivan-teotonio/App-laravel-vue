
<template>
    <Head><title>Sobre</title></Head>

    <h1>dgbkçgkçgçg  {{ name }}</h1>
    <br>
    <menu-layout />
</template>

<script>
import { Link, Head } from '@inertiajs/inertia-vue3';
import MenuLayout from '../Layouts/LayoutMenu.vue';

export default {
    name:'PageAbout',

    components:{
        MenuLayout,
    },

    props: {
        name: String
    },
}
</script>

<style lang="scss" scoped>

</style>