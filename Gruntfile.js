'use strict';
module.exports = function(grunt) {
    // Load all tasks
    require('load-grunt-tasks')(grunt);
    // Show elapsed time
    require('time-grunt')(grunt);

    var jsVendorList = [
        'assets/js/vendor/*.js',
    ];

    var jsModuleList = [
        'assets/js/module/*.js',
        'assets/js/app.js',
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
                files: {
                    'assets/js/dist/vendor.min.js': [jsVendorList],
                    'assets/js/dist/app.min.js': [jsModuleList],
                }
            },
        },
        uglify: {
            dist: {
                files: {
                    'assets/js/dist/vendor.min.js': [jsVendorList],
                    'assets/js/dist/app.min.js': [jsModuleList]
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
                    jsVendorList,
                    jsModuleList,
                    '<%= jshint.all %>'
                ],
                tasks: ['jshint', 'concat']
            },
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