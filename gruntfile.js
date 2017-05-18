module.exports = function(grunt) {
  require('jit-grunt')(grunt);

  var SASS_DIR = 'sass/';
  var EOL = require('os').EOL;

  var config = {
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: "compressed"
        },
        files: {
          "assets/css/main.css": "assets/sass/main.scss",
          // "assets/css/print.css": "assets/sass/print.scss",
        }
      }
    },
    watch: {
      styles: {
        files: ['assets/sass/**/*.scss'], // which files to watch
        tasks: ['sass'],
        options: {
          nospawn: true,
          livereload: 1337,
        }
      }
    },
    grunt: {
      build_parent: {
        gruntfile: '../blockups/Gruntfile.js',
        tasks: ['build_blocks', 'build']
      }
    }
  };

  grunt.initConfig(config);

  grunt.registerTask('build', 'run build and parent build', function(n) {
    if (grunt.option('parent') == true) {
      grunt.task.run('grunt:build_parent');
    }
    grunt.task.run('default');
  });

  grunt.registerTask('default', ['sass', 'watch']);
};



