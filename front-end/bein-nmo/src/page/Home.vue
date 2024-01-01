<template>	<div class="main">
		<Header v-if="$route.meta.noHeader !== true"></Header>
		<Content />
		<!-- <Suspense>
			<template #default>
			</template>
			<template #fallback> Loadin..... </template>
		</Suspense> -->
	</div>
	<div class="container">
		<Navigation v-if="$route.meta.noHeader !== true" />
	</div>
</template>
<script>
import Header from "../components/Header.vue";
import Navigation from "../components/Navigation.vue";
import Content from "../components/Content.vue";

import {ref, onMounted} from "vue";

import axios from "axios";

export default {
	name: "Home",
	components: {
		Header,
		Navigation,
		Content,
	},
	setup() {
		const user = ref({});

		onMounted(async () => {
			await getUser();
		});

		const getUser = async () => {
			try {
				const response = await axios.get("/api/user");
				console.log(response.data);
				user.value = response.data;
			} catch (error) {
				console.error(error);
			}
		};

		return {
			user,
		};
	},
};
</script>
