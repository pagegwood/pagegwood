# PageGWood
==================

Options for local development:
1) Larvel Valet
2) Larvel Homestead


## Docs and versions
1. [Themosis version 2.0](https://framework.themosis.com/docs/2.0/introduction)
2. [Vue.js v2](https://vuejs.org/v2/guide/) for Javascript
3. Node version latest
4. NPM version latest
5. [SUIT CSS naming conventions](https://github.com/suitcss/suit/blob/master/doc/naming-conventions.md)
6. PHP 7.7
7. [WP Fluent](https://github.com/storyware/wp-fluent) version 1.2 for fluent style WP Queries
8. [Tailwind CSS](https://tailwindcss.com/docs).


## Important Notes

1. All SCSS changes are to be made in `htdocs/content/themes/storyware/assets/sass`
2. All view file changes are to be made in `htdocs/content/themes/storyware/views` using blade syntax. Review docs on blade templating here: https://framework.themosis.com/docs/1.3/blade/
3. All of our classes and logic for models live within the `/App` directory. We do not use the standard Themosis classes for posts, etc.. We use our own, which rely on [WP Fluent](https://github.com/storyware/wp-fluent), a library that serves as a wrapper around WP_Query for Laravel style fluent queryies.
4. Please reference our [Front End Architecture](https://bitbucket.org/storyware/frontend-architecture) guide when developing new HTML, CSS, or JS. This project utilizes Suit CSS, a custom set of atomic utilities, and Vue.js.


## Laravel Valet Setup instructions
1. TODO: follow Storyware instructions for Valet
2. Copy `env.example` to `.env` and enter your local database credentials, along with plugin installation keys
3. Import the SQL backup from your magic location.
4.  Run `composer install` from project root to install PHP dependencies
5. Create `advanced-cache.php` in `htdocs/content` directory
5. Install your front end dependencies:
  ```
  $ cd htdocs/content/themes/wood
  $ npm install
  ```
4. To start sass watch task, run the following from active theme directory (htdocs/content/themes/wood):
  ```
  $ npm run watch
  ```
5. Note that browsersync is not currently setup to work with Laravel Valet on this project. TODO.
6. Login in at `http://pagegwood.test/cms/wp-login.php` to see your changes, as caching is enabled
7. We do not compile assets in our automated deployments. Instead, we are committing our compiled assets. Do this like so when you are ready to deploy, after merging into the deploy branch:
```
$ cd htdocs/content/themes/wood
$ npm run production
```
9. If you make changes to the tailwind config, run `npm run export-tailwind-config` in the wood theme directory to export the tailwind config values into variables that we use in other scss files.
10. Before deploying to staging, increment constant (example 4.0.1-b1 -> 4.0.1-b2) in `htdocs/content/themes/wood/style.css`


## Homestead Vagrant Development

1. `cd` into project and run `./vendor/bin/homestead make`
2. then run `vagrant up`
