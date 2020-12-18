window.Vue = require("vue");

window.jQuery = require("jquery");

window.$ = window.jQuery;

if (!global._babelPolyfill && !window._babelPolyfill) {

  require("@babel/polyfill");

}

require("./utilities/ie11-polyfills.js");


import VueEvents from "vue-events";

Vue.use(VueEvents);


if (process.env.NODE_ENV === "production") {
  Vue.config.devtools = false;
  Vue.config.debug = false;
  Vue.config.silent = true;
} else {
  Vue.config.devtools = true;
}


import StickyHeader from "./components/StickyHeader";
import MobileMenu from "./components/MobileMenu";

const app = new Vue({
  el: "#js-App",
  delimiters: ["${", "}"],
  components: {
    StickyHeader,
    MobileMenu
  }
});
