export default class Emoji {
  static addEmoji() {
    if (navigator.userAgent.indexOf('Mac OS X') !== -1) {
      window.location.hash = '🌴';
    }
  }
}
