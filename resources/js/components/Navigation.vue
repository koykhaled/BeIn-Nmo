<template>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <router-link to="/">
                        <a href="/" class="header__logo">
                            <p><img src="./" alt="" />logo</p>
                            <h2 class="logo-text">BeInMedia</h2>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Home</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/categories">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="copy-outline"></ion-icon>
                            </span>
                            <span class="title">Categories</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/items">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="fast-food-outline"></ion-icon>
                            </span>
                            <span class="title">Items</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/items/apply-discount">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="pricetag-outline"></ion-icon>
                            </span>
                            <span class="title">Discounts</span>
                        </a>
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    name: "Navigation",
};
</script>
