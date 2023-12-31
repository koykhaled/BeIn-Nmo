<script setup>
import { onMounted, ref } from "vue";

import { useRouter } from "vue-router";

import axios from "axios";

const router = useRouter();

let categories = ref([]);

let loading = ref(true);

onMounted(async () => {
    await getCategories();
    loading.value = false;
});

const getCategories = async () => {
    let response = await axios.get("/api/categories");
    categories.value = response.data.categories;
};

async function deleteCategory(categorySlug) {
    try {
        await axios.delete(`/api/categories/${categorySlug}`).then((res) => {
            alert(res.data.message);
            loading.value = true;
            getCategories();
        });
    } catch (err) {
        console.error(err);
        alert("Error deleting category");
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
                <h2>Category</h2>
                <p v-if="categories.length == 1">
                    {{ categories.length }} Category
                </p>
                <p v-else-if="categories.length > 1">
                    {{ categories.length }} Categories
                </p>
                <p v-else>No Items</p>
            </div>
            <router-link to="/categories/new-category">
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
                    Create Category
                </a>
            </router-link>
        </div>
        <div class="topics">
            <div class="cardHeader">
                <!-- @if ($topics_count > 0) -->
                <table>
                    <thead v-if="categories.length > 0">
                        <tr>
                            <td>Name</td>
                            <td>Parent</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="category in categories"
                            :key="category.id"
                            v-if="categories.length > 0"
                        >
                            <td>{{ category.name }}</td>
                            <td>{{ category.parent }}</td>
                            <td>
                                <button
                                    class="btn-delete"
                                    @click="deleteCategory(category.slug)"
                                    type="submit"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                        <p class="empty" v-else>There is No Categories Yet</p>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
