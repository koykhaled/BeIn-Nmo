<template>
    <div class="main">
        <Header v-if="$route.meta.noHeader !== true"></Header>
        <Content />
    </div>
    <div class="container">
        <Navigation v-if="$route.meta.noHeader !== true" />
    </div>
</template>
<script>
import Header from "../components/Header.vue";
import Navigation from "../components/Navigation.vue";
import Content from "../components/Content.vue";

import { ref, onMounted } from "vue";

import axios from "axios";

export default {
    name: "Home",
    components: {
        Header,
        Navigation,
        Content,
    },
};
</script>
