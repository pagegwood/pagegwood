import Headroom from 'headroom.js';

export default class StickyHeader {
  static sticky() {
    const header = document.querySelector('.js-StickyHeader');
    if (header) {
      const headroom = new Headroom(header, {
        offset: 124,
        tolerance: 0,
      });
      // initialise
      headroom.init();
    }
  }
}
