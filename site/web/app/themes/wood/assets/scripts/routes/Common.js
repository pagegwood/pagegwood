import Instagram from '../ui/instagram';
import Emoji from '../ui/emoji';
import StickyHeader from '../ui/sticky_header';

export default {
  init() {
    Emoji.addEmoji();
    Instagram.build();
    StickyHeader.sticky();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
