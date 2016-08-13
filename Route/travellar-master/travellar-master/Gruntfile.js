var jspaths = ['src/js-dev/Util.js','src/js-dev/model/*.js','src/js-dev/view/*.js','src/js-dev/collection/*.js','src/js-dev/Router.js','src/js-dev/App.js','src/js-dev/main.js'];
var csspaths = ["src/sass/*.scss"];
var templatepaths = ["src/templates/**/*.hbs"];

var concatpaths = ['src/js/templates.js'].concat(jspaths);

module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    concat: {
      options: {
        banner: "(function(){\n\n",
        footer: "\n\n})();",
        separator: '\n\n'
      },
      dist: {
        src: concatpaths,
        dest: 'src/js/main.js'
      }
    },

    watch: {
      scripts:{
        files: jspaths,
        tasks: ['jshint','handlebars','concat','clean']
      },
      css:{
        files: csspaths,
        tasks:['compass:development']
      },
      handlebars:{
        files: templatepaths,
        tasks: ['handlebars','concat','clean']
      }
    },

    uglify: {
      default: {
        options: {
          wrap: true
        },
        files: {
          'out/js/main.js': concatpaths
        }
      }
    },

    copy: {
      development: {
        files: [
          {
            expand: true,
            cwd: 'src/js-dev/',
            src: ['vendor/**'],
            dest: 'src/js/'
          }
        ]
      },
      production: {
        files: [
          {
            expand: true,
            cwd: 'src/',
            src: ['index.html','layout/**', 'images/**', 'js/vendor/**'],
            dest: 'out/'
          }
        ]
      }
    },

    compass: {
      development: { 
        options: {
          sassDir: 'src/sass',
          cssDir: 'src/layout/stylesheets',
          imagesDir: 'src/layout/images',
          relativeAssets: true,
          environment: 'development'
        }
      },
      production: { 
        options: {
          sassDir: 'src/sass',
          cssDir: 'src/layout/stylesheets',
          imagesDir: 'src/layout/images',
          relativeAssets: true,
          environment: 'production',
          outputStyle: 'compressed',
          force: true
        }
      }
    },

    strip: {
      main: {
        src: 'out/js/main.js',
        dest: 'out/js/main.js',
        options : {
          nodes : ['console.log']
        }
      }
    },

    handlebars: {
      compile: {
        options: {
          namespace: "hbs",
          processName: function(filePath) {
            var pieces = filePath.split("/");
            return pieces[pieces.length - 1].split(".")[0];
          },
          partialsUseNamespace: true
        },
        files: {
          "src/js/templates.js": templatepaths
        }
      }
    },

    jshint:{
      default:{
        options: {
          curly: true,
          eqeqeq: true,
          immed: true,
          latedef: true,
          noarg: true,
          sub: true,
          undef: true,
          eqnull: true,
          browser: true,
          noempty: true,
          trailing: false,
          smarttabs: true,
          globals:{
              $: true,
              console:true,
              Handlebars:true,
              hbs:true,
              _:true,
              Backbone:true,
              CryptoJS: true,
              FastClick: true,
              moment: true,
              google: true
          },
        },
        files:{
          src: jspaths
        }
      }
    },

    clean: ['src/js/templates.js'],

  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-handlebars');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-strip');

  grunt.registerTask('default', ['jshint','handlebars','concat','compass:development','copy:development','clean','watch']);
  grunt.registerTask('production', ['jshint','handlebars','uglify','compass:production','copy:production', 'strip']);

};
