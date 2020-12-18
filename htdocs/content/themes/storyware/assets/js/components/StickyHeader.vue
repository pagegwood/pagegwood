<template>
  <div class="Header-anchor js-HeaderAnchor"></div>
</template>

<script>

import debounce from 'lodash/debounce';

export default {
  name: "StickyHeader",

  data() {
    return {
      anchorPosition: null,
      offset: 0,
      position: null,
      measured: false,
      sticky: false,
      anchor: null
    }
  },

  methods: {

    makeSticky: function () {
      $('body').removeClass('is-not-fixed-header');
      $('body').addClass('is-fixed-header');
      this.sticky = true;
    },

    removeSticky: function () {
      $('body').removeClass('is-fixed-header');
      $('body').addClass('is-not-fixed-header');
      this.sticky = false;
    },

    onDownScroll: function () {
      $('body').addClass('is-scrolling-down');
      $('body').removeClass('is-scrolling-up');
    },

    onUpScroll: function () {
      $('body').removeClass('is-scrolling-down');
      $('body').addClass('is-scrolling-up');
    },

    measure: function () {
      this.anchorPosition = this.anchor.offset().top;
      this.measured = true;
      this.scrollWatch();
    },

    scrollWatch: function () {

      var scroll = $(window).scrollTop();

      if (scroll > this.anchorPosition + this.offset){
        if(this.sticky == false){
          this.makeSticky();
        }
      } else if (scroll < this.anchorPosition) {
        if(this.sticky == true){
          this.removeSticky();
        }
      }

      if(this.sticky == true){
        if( scroll > this.position ){
          this.onDownScroll();
        } else{
          this.onUpScroll();
        }
      }

      this.position = scroll;
    },

    ScrollWatchImmediate: function() {
      var scroll = $(window).scrollTop();

      if (scroll > 0) {
        $("body").addClass("is-scrolling");
      } else {
        $("body").removeClass("is-scrolling");
        $("body").removeClass("is-scrolling-up");
        $("body").removeClass("is-scrolling-down");
      }
    },

    checkPosition: function () {
      var scrollPosition = $(document).scrollTop();

      if (scrollPosition > 0 ) {
        this.onDownScroll();
      }
    }
  },

  mounted: function () {
    this.anchor = $('.js-HeaderAnchor');
    this.position = $(window).scrollTop();

    this.measure();

    this.checkPosition();
  },

  created () {
    this.handleScrollWatch = debounce(this.scrollWatch, 50);
    this.handleScrollWatchImmediate = debounce(this.ScrollWatchImmediate, 0);
    this.handleMeasure = debounce(this.measure, 100);

    document.addEventListener('scroll', this.handleScrollWatch);
    document.addEventListener("scroll", this.handleScrollWatchImmediate);
    window.addEventListener('resize', this.measure);
  },
  destroyed () {
    document.removeEventListener('scroll', this.handleScrollWatch);
    window.removeEventListener('resize', this.measure);
  }
};


</script>
