# Lothian Salvage
## Requirements

* PHP >= 5.6
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

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

2. Access WP admin at `http://example.com/wp/wp-admin`

## API Documentation

API documentation is available here:
* [https://github.com/ackmann-dickenson/adlon/tree/master/app/themes/lothian/App/Http/api-documentation](https://github.com/ackmann-dickenson/adlon/tree/master/app/themes/lothian/App/Http/api-documentation)

## Deploying

Your key needs to be installed on the server for deployment to succeed. You will also need the Ansible vault password.

* Install Ansible v2.2 or greater. Use Homebrew, or the Pip (the recommended way): https://valdhaus.co/writings/ansible-mac-osx/
* In Terminal, change into the home directory of the application
* Run `/bin/bash provisioning/bin/deploy <environment> <branch>`, for example:  `/bin/bash provisioning/deploy staging master`
* Enter the vault password when prompted.
* Code is checked out from Github into a new directory. Config file changes are applied. The build script runs. The new directory becomes the webroot.
