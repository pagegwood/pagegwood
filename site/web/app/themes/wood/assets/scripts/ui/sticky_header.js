import Headroom from 'headroom.js';

export default class StickyHeader {
  static sticky() {
    const header = document.querySelector('.js-StickyHeader');
    if (header) {
      const headroom = new Headroom(header);
      // initialise
      headroom.init();
    }
  }
}
