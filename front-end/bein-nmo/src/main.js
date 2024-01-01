import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router/index';

import axios from 'axios';


axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
axios.defaults.baseURL = 'http://localhost:8000';

createApp(App).use(router).mount('#app')



// ================================

let list = document.querySelectorAll(".navigation li");
function activeLink() {
    list.forEach(item=>{
        item.classList.remove("hovered");
    })
    this.classList.add("hovered");
}

list.forEach(item=>item.addEventListener("mouseover",activeLink))

// Menu Toggle

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function(){
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}