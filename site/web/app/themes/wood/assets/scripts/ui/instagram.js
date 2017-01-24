import Instafeed from 'instafeed.js';

export default class Instagram {
  static build() {
    const element = document.getElementById('instafeed');
    if (element) {
      const feed = new Instafeed({
        get: 'user',
        userId: '15745822',
        accessToken: '15745822.1677ed0.78bb241cc4824b94a1d85b04ce3ae68a',
        limit: 8,
        resolution: 'low_resolution',
      });
      feed.run();
    }
  }
}
