/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue";

const app = createApp({});

import ExampleComponent from "./components/ExampleComponent.vue";
import ThoughtComponent from "./components/ThoughtComponent.vue";
import MyThoughtsComponent from "./components/MyThoughtsComponent.vue";
import FormComponent from "./components/FormComponent.vue";

app.component("thought-component", ThoughtComponent);
app.component("my-thoughts-component", MyThoughtsComponent);
app.component("form-component", FormComponent);

app.mount("#app");
