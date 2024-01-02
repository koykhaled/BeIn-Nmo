<script setup>
import axios from "axios";

import { onMounted, ref } from "vue";

import { useRouter } from "vue-router";

const router = useRouter();

let items = ref([]);
let computed_discount = ref([]);
let computed_price = ref([]);
let menu = ref([]);

let loading = ref(true);

onMounted(async () => {
    await getItems();
    loading.value = false;
});

const getItems = async () => {
    let response = await axios.get("/api/items");
    console.log(response.data.computed_discount);
    items.value = response.data.items;
    computed_discount.value = response.data.computed_discount;
    computed_price.value = response.data.computed_price;
    menu.value = response.data.menu;
};

async function deleteItem(itemSlug) {
    loading.value = true;

    try {
        // await axios.delete(`/api/items/${itemSlug}`).then(res => {
        // 	alert("Item deleted successfully");
        console.log(itemSlug);
        // });
    } catch (err) {
        console.error(err);
        alert("Error deleting Item");
    } finally {
        loading.value = false;
        location.reload();
    }
}
</script>
<template>
    <div v-if="loading" class="loading-container">
        <div class="spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>
    <div v-else class="details">
        <div class="topic__header">
            <div>
                <h2>{{ menu }}</h2>
                <p v-if="items.length == 1">{{ items.length }} Item</p>
                <p v-else-if="items.length > 1">{{ items.length }} Items</p>
                <p>Menu price : {{ computed_price }}</p>
                <p v-if="computed_discount > 0">
                    Menu discount : {{ computed_discount }}
                </p>
                <p>No Items</p>
            </div>
            <router-link to="/items/new-item">
                <a class="btn btn--main" href="#">
                    <svg
                        version="1.1"
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 32 32"
                    >
                        <title>add</title>
                        <path
                            d="M16.943 0.943h-1.885v14.115h-14.115v1.885h14.115v14.115h1.885v-14.115h14.115v-1.885h-14.115v-14.115z"
                        ></path>
                    </svg>
                    Create Items
                </a>
            </router-link>
        </div>
        <div class="topics">
            <div class="cardHeader">
                <!-- @if ($topics_count > 0) -->
                <table>
                    <thead v-if="items.length > 0">
                        <tr>
                            <td>Name</td>
                            <td>Category</td>
                            <td>price</td>
                            <td>Discount Price</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="item in items"
                            :key="item.id"
                            v-if="items.length > 0"
                        >
                            <td>{{ item.name }}</td>
                            <td>{{ item.category }}</td>
                            <td>{{ item.price }}</td>
                            <td v-if="item.discount_price !== null">
                                {{ item.discount_price }}
                            </td>
                            <td v-else>{{ item.price }}</td>
                            <td>
                                <button
                                    class="btn-delete"
                                    @click="deleteItem(item.slug)"
                                    type="submit"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <p class="empty" v-else>There is No items Yet</p>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
