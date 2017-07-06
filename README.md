# Pressed
## Requirements

* PHP >= 5.6
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* Yarn - [Install](https://yarnpkg.com/en/docs/getting-started)

## Features

* Better folder structure
* Dependency management with [Composer](http://getcomposer.org)
* Easy WordPress configuration with environment specific files
* Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
* Autoloader for mu-plugins (use regular plugins as mu-plugins)
* Enhanced security (separated web root and secure passwords with [wp-password-bcrypt](https://github.com/roots/wp-password-bcrypt))

## Installation

1. Copy `.env.example` to `.env` and update environment variables:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (http://example.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
  * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`

  Or, you can cut and paste from the [Roots WordPress Salt Generator][roots-wp-salt].

2. run `composer install` in root dir.
3. Navigate to `app/themes/pressed/` and run `yarn` to install dev dependencies and build theme assets.
4. Access WP admin at `http://example.com/wp/wp-admin`

## Environmental Checks
The `wp-config.php` should define `WP_ENV` as `dev` for local development. Production checks should be flagged by this constant not being defined for fail safe reason. *ie* `<?php if ( !defined('WP_ENV') ): ?>`

## Resources
1. [PSR-4 Autoloader](http://www.php-fig.org/psr/psr-4/)
2. [BEM Introduction](http://getbem.com/introduction/)
3. [Sass 7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern)
4. [Modular JS Pattern](https://toddmotto.com/mastering-the-module-pattern/)