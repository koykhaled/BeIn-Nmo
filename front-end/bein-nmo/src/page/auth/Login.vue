<template>
    <!-- <div
		v-if="loading"
		class="loading-container"
	>
		<div class="spinner"></div>
		<div class="loading-text">Loading...</div>
	</div> -->
    <main class="auth layout">
        <div class="layout__box login-box">
            <div class="layout__boxHeader">
                <div class="layout__boxTitle">
                    <h3>Login</h3>
                </div>
            </div>
            <div class="layout__body">
                <div
                    class="alert alert-danger"
                    v-if="backendErrors"
                    v-for="error in backendErrors"
                >
                    {{ error }}
                </div>
                <form @submit.prevent="login">
                    <div class="form__group form__group">
                        <label for="room_name">Email</label>
                        <input
                            id="email"
                            name="email"
                            type="text"
                            placeholder="e.g. khaled@example.com"
                            v-model="email"
                        />
                        <div class="error" v-if="errors.email">
                            {{ errors.email }}
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="password">Password</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                            v-model="password"
                        />
                        <div class="error" v-if="errors.password">
                            {{ errors.password }}
                        </div>
                    </div>

                    <button class="btn btn--main" type="submit">
                        <svg
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 32 32"
                        >
                            <title>lock</title>
                            <path
                                d="M27 12h-1v-2c0-5.514-4.486-10-10-10s-10 4.486-10 10v2h-1c-0.553 0-1 0.447-1 1v18c0 0.553 0.447 1 1 1h22c0.553 0 1-0.447 1-1v-18c0-0.553-0.447-1-1-1zM8 10c0-4.411 3.589-8 8-8s8 3.589 8 8v2h-16v-2zM26 30h-20v-16h20v16z"
                            ></path>
                            <path
                                d="M15 21.694v4.306h2v-4.306c0.587-0.348 1-0.961 1-1.694 0-1.105-0.895-2-2-2s-2 0.895-2 2c0 0.732 0.413 1.345 1 1.694z"
                            ></path>
                        </svg>

                        Login
                    </button>
                </form>

                <div class="auth__action">
                    <p>Haven't signed up yet?</p>
                    <a href="">Sign Up</a>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import axios from "axios";
import SignupValidations from "../../services/SignupValidations";
export default {
    data() {
        return {
            email: "",
            password: "",
            errors: [],
            error: "",
            backendErrors: [],
        };
    },
    methods: {
        async login() {
            var mythis = this;
            let validations = new SignupValidations(this.email, this.password);

            this.errors = validations.checkValidations();
            if (this.errors.length) {
                return false;
            }
            this.error = "";

            await axios
                .post("/login", {
                    email: this.email,
                    password: this.password,
                })
                .then((res) => {
                    this.$router.push("/");
                    this.email = "";
                    this.password = "";
                    this.errors = [];
                    this.backendErrors = [];
                    this.error = "";
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status !== 201) {
                            this.backendErrors = error.response.data.message; // Store backend error messages
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
