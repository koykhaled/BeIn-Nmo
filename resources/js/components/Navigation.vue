<template>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <router-link to="/">
                        <a href="/" class="header__logo">
                            <p><img src="./" alt="">logo</p>
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
                                <ion-icon name="person-outline"></ion-icon>
                            </span>
                            <span class="title">Categories</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/items">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="book-outline"></ion-icon>
                            </span>
                            <span class="title">Items</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/items/apply-discount">
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Discounts</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/">
                        <a title="logout" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span
                                class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                    </router-link>
                    <form id="logout-form" action="#" method="post">
                        <!-- @csrf -->
                    </form>

                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Navigation',
    }
</script>