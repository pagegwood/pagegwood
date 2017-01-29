// import external dependencies
import 'jquery';

// import local dependencies
import Router from './util/router';
import common from './routes/Common';

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
const routes = {
  // All pages
  common,
};

// Load Events
jQuery(document).ready(() => new Router(routes).loadEvents());
