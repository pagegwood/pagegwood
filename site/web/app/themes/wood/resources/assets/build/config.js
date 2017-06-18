const path = require('path');
const { argv } = require('yargs');
const merge = require('webpack-merge');

const userConfig = require('../config');

const isProduction = !!((argv.env && argv.env.production) || argv.p);
const rootPath = (userConfig.paths && userConfig.paths.root)
  ? userConfig.paths.root
  : process.cwd();

const config = merge({
  copy: 'images/**/*',
  proxyUrl: 'http://localhost:3000',
  cacheBusting: '[name]_[hash]',
  paths: {
    root: rootPath,
    assets: path.join(rootPath, 'resources/assets'),
    dist: path.join(rootPath, 'dist'),
  },
  enabled: {
    sourceMaps: !isProduction,
    optimize: isProduction,
    cacheBusting: isProduction,
    watcher: !!argv.watch,
  },
  watch: [],
}, userConfig);

module.exports = merge(config, {
  env: Object.assign({ production: isProduction, development: !isProduction }, argv.env),
  publicPath: `${config.publicPath}/${path.basename(config.paths.dist)}/`,
  manifest: {},
});
