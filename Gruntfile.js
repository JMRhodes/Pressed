'use strict';
module.exports = function(grunt) {
    // Load all tasks
    require('load-grunt-tasks')(grunt);
    // Show elapsed time
    require('time-grunt')(grunt);

    var jsFileList = [
        'assets/js/plugins/*.js',
    ];

    grunt.initConfig({
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'assets/js/*.js',
                '!assets/**/*.min.*'
            ]
        },
        sass: {
            dev: {
                options: {
                    style: 'expanded',
                    compass: false,
                },
                files: {
                    'style.css': [
                        'assets/scss/app.scss'
                    ]
                }
            },
            build: {
                options: {
                    style: 'compressed',
                    compass: false,
                },
                files: {
                    'style.css': [
                        'assets/scss/app.scss'
                    ]
                }
            }
        },
        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: [jsFileList],
                dest: 'assets/js/plugins.min.js',
            },
        },
        uglify: {
            dist: {
                files: {
                    'assets/js/plugins.min.js': [jsFileList]
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
            },
            dev: {
                options: {
                    map: {
                        prev: 'assets/scss/'
                    }
                },
                src: 'style.css'
            },
            build: {
                src: 'style.css'
            }
        },
        watch: {
            options: {
                spawn: false,
            },
            sass: {
                files: [
                    'assets/scss/*.scss',
                    'assets/scss/**/*.scss'
                ],
                tasks: ['sass:dev', 'autoprefixer:dev']
            },
            js: {
                files: [
                    jsFileList,
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'concat']
            },
            livereload: {
                // Browser live reloading
                // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
                options: {
                    livereload: false
                },
                files: [
                    'style.css',
                    'assets/js/theme.js',
                    'templates/*.php',
                    '*.php'
                ]
            }
        }
    });

    // Register tasks
    grunt.registerTask('default', [
        'dev'
    ]);
    grunt.registerTask('dev', [
        'jshint',
        'sass:dev',
        'autoprefixer:dev',
        'concat'
    ]);
    grunt.registerTask('build', [
        'jshint',
        'sass:build',
        'autoprefixer:build',
        'uglify',
    ]);
};