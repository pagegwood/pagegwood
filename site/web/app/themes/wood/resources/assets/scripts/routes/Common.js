import Instagram from '../ui/instagram';
//import Emoji from '../ui/emoji';
import StickyHeader from '../ui/sticky_header';
import Lightbox from '../ui/lightbox';

export default {
  init() {
    //Emoji.addEmoji();
    Instagram.build();
    StickyHeader.sticky();
    Lightbox.init();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
