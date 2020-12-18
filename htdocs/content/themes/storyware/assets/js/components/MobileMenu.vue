<template>
  <div class="Menu Menu--mobile">
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "MobileMenu",

  data() {
    return {};
  },

  methods: {
    handleMenuToggle: function () {
      const toggleIcons = document.querySelectorAll(
        '[data-trigger="js-headerIcon"]'
      );
      const html = document.querySelector("html");

      toggleIcons.forEach((item) => {
        item.addEventListener("click", () => {
          html.classList.toggle("is-active-menu");
        });
      });
    },
  },
  mounted: function () {
    this.handleMenuToggle();
  },
};
</script>
