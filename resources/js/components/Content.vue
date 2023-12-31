<template>
    <Title/>
    <router-view/>
</template>

<script>

import Title from './Title.vue';
export default {
    name: 'Content',
    components : {Title},
    watch: {
        $route: {
            handler() {
                document.title = this.$route.meta.title  + ' | BeInMedia'
            }
        }
    }
}
</script>