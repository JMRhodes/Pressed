# Pressed
**Pressed, the WordPress starter theme.**

Pressed requires a minimum of WordPress 4.5.

## What tools do I need to use Pressed?
Pressed is built with **Bower** and **Gulp** usage in mind and is the recommended way to use this theme.
However theme assets should compile just fine using other tools.

## Getting Started With Pressed

### Install node.js.
- Using the command line, navigate to your theme directory
- Run `npm install` to install Gulp plugins and Bower packages and Composer autoload.
- Run `gulp` to confirm everything is working

### What Gulp tasks are included?
Pressed comes with a few useful Gulp tasks out of the box:

#### gulp
The default Gulp task. Runs the `build` task and watches files for changes.

#### gulp Sass
Compiles and minifies the `style.scss` stylesheet.

#### gulp javascript
Concats and minifies the main JS file.

#### gulp build
Runs the clean, copy:hc, sass and javascript tasks.

#### gulp renametheme
This will rename all references to the theme text domain, function names and any other theme specific names.
*To use this task please make sure you change the `THEME` variable in `gulpfile.js` before running this task.*

## Copyright and License
The following resources are included or used in part within the theme package.

* [Hybrid Core](http://themehybrid.com/) by Justin Tadlock - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
* [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2016 &copy; [Justin Rhodes](http://rhodescodes.com).