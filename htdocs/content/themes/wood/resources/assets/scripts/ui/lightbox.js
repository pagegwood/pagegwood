import $ from 'jquery';

import 'hammerjs';
import 'featherlight/release/featherlight.min';
import 'featherlight/release/featherlight.gallery.min';

export default class Lightbox {
  static init() {
    const gallery = $('.js-Lightbox');
    if (gallery) {
      const $gallery = $(gallery.find('a'));
      $gallery.featherlightGallery({
        previousIcon: '<i class="icon-chevron-thin-left"></i>',
        nextIcon: '<i class="icon-chevron-thin-right"></i>',
      });
    }
  }
}
