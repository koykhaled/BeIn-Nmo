<script setup>
import axios from "axios";

import { onMounted, ref } from "vue";

let categories = ref([]);

let form = ref([]);

let loading = ref(true);

onMounted(async () => {
    await getCategories();
    loading.value = false;
});

const getCategories = async () => {
    let response = await axios.get("/api/categories");
    categories.value = response.data.categories;
};
</script>
<template>
    <div v-if="loading" class="loading-container">
        <div class="spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>
    <div v-else class="layout__box">
        <div class="layout__boxHeader">
            <div class="layout__boxTitle">
                <a href="">
                    <router-link to="/categories">
                        <svg
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                        >
                            <title>arrow-left</title>
                            <path
                                d="M13.723 2.286l-13.723 13.714 13.719 13.714 1.616-1.611-10.96-10.96h27.625v-2.286h-27.625l10.965-10.965-1.616-1.607z"
                            ></path>
                        </svg>
                    </router-link>
                </a>
                <h3>Create Item</h3>
            </div>
        </div>
        <div class="layout__body">
            <ul v-if="Object.keys(this.errorMessage).length > 0">
                <li class="li-error">{{ errorMessage }}</li>
            </ul>

            <div class="form__group">
                <label for="name">Item Name</label>
                <input
                    id="name"
                    v-model="model.item.name"
                    type="text"
                    placeholder="E.g. Food , Drink ..etc"
                />
            </div>

            <div class="form__group">
                <label for="name">Item Price</label>
                <input
                    id="name"
                    v-model="model.item.price"
                    type="text"
                    placeholder="E.g. Food , Drink ..etc"
                />
            </div>

            <div class="form__group">
                <label for="cateogry">Parent</label>
                <select id="cateories" v-model="model.item.category_id">
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <div class="form__action">
                <a class="btn btn--dark" href=""
                    ><router-link to="/">Cancel</router-link></a
                >
                <button class="btn btn--main" @click="createItem" type="submit">
                    Create Item
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "itemCreate",
    data() {
        return {
            errorMessage: "",
            model: {
                item: {
                    name: "",
                    price: "",
                    category_id: "",
                },
            },
        };
    },
    methods: {
        createItem() {
            var mythis = this;
            axios
                .post("/api/items/", this.model.item)
                .then((res) => {
                    this.$router.push("/items");
                    this.model.item = {
                        name: "",
                        price: "",
                        category_id: "",
                    };
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status !== 201) {
                            mythis.errorMessage = error.response.data.message;
                        }
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log("Error", error.message);
                    }
                });
        },
    },
};
</script>
