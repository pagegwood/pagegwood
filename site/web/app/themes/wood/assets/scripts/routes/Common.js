import Instagram from '../ui/instagram';
import Emoji from '../ui/emoji';

export default {
  init() {
    Emoji.addEmoji();
    Instagram.build();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
