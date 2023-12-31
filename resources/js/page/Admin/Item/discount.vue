<script setup>
import { onMounted, ref } from "vue";

let categories = ref([]);

let items = ref([]);
let form = ref([]);

let loading = ref(true);

onMounted(async () => {
    await getCategories();
    await getItems();
    loading.value = false;
});

const getCategories = async () => {
    let response = await axios.get("/api/categories");
    categories.value = response.data.categories;
};

const getItems = async () => {
    let response = await axios.get("/api/items");
    items.value = response.data.items;
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
                </a>
                <h3>Create Item</h3>
            </div>
        </div>
        <div class="layout__body">
            <ul v-if="Object.keys(this.errorMessage).length > 0">
                <li class="li-error">{{ errorMessage }}</li>
            </ul>

            <div class="form__group">
                <label for="type">Discount Type</label>
                <select id="type" v-model="discountType">
                    <option value="menu">Menu</option>
                    <option value="item">Item</option>
                    <option value="category">Category</option>
                </select>

                <label v-if="discountType === 'category'" for="category"
                    >Category</label
                >
                <select
                    v-if="discountType === 'category'"
                    id="category"
                    v-model="category_id"
                >
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.name }}
                    </option>
                </select>

                <label v-if="discountType === 'item'" for="item">Item</label>
                <select
                    v-if="discountType === 'item'"
                    id="item"
                    v-model="item_id"
                >
                    <option
                        v-for="item in items"
                        :key="item.id"
                        :value="item.id"
                    >
                        {{ item.name }}
                    </option>
                </select>
            </div>

            <div class="form__group">
                <label for="name">Discount Value</label>
                <input
                    id="name"
                    v-model="discountValue"
                    type="text"
                    placeholder="E.g. Food , Drink ..etc"
                />
            </div>

            <div class="form__action">
                <a class="btn btn--dark" href="">Cancel</a>
                <button
                    class="btn btn--main"
                    @click="applyDiscount"
                    type="submit"
                >
                    Apply
                </button>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    data() {
        return {
            errorMessage: "",
            discountType: "",
            discountValue: "",
            item_id: "",
            category_id: "",
        };
    },
    methods: {
        applyDiscount() {
            // Make an API request to apply the discount
            var mythis = this;
            axios
                .post("/api/items/apply-discount", {
                    type: this.discountType,
                    discount: this.discountValue,
                    item_id: this.item_id,
                    category_id: this.category_id,
                })
                .then((res) => {
                    this.$router.push("/items");
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

function enableList(type) {
    if (type.value == "item") {
        document.getElementById("type").classList.remove("d-none");
    }
}
</script>
