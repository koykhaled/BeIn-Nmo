<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();

let categoriesCount = ref([]);
let itemsCount = ref([]);
let loading = ref(true);

onMounted(async () => {
    await getCategories();
    loading.value = false;
});

const getCategories = async () => {
    let response = await axios.get("/api/dashboard");
    categoriesCount.value = response.data.categories;
    itemsCount.value = response.data.items;
};
</script>

<template>
    <div v-if="loading" class="loading-container">
        <div class="spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>
    <div v-else class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">{{ categoriesCount }}</div>
                <div class="cardName" v-if="categoriesCount > 1">
                    Categories
                </div>
                <div class="cardName" v-else-if="categoriesCount === 1">
                    Category
                </div>
                <div class="cardName" v-else>No Categories</div>
            </div>
            <div class="iconBox">
                <ion-icon name="copy-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ itemsCount }}</div>
                <div class="cardName" v-if="itemsCount === 1">Item</div>
                <div class="cardName" v-else-if="itemsCount > 1">Items</div>
                <div class="cardName" v-else>No Item</div>
            </div>
            <div class="iconBox">
                <ion-icon name="fast-food-outline"></ion-icon>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Main",
};
</script>
