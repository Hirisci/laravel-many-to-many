window.Vue = require("vue");

import App from "./view/App";

const app = new Vue({
    el: "#app",
    render: (h) => h(App),
});
