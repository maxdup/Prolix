module.exports = function(grunt) {
  grunt.initConfig({
    less: {
      development: {
        options: {
          compress: true,
          yuicompress: true,
          optimization: 2
        },
        files: {
                // target.css file: source.less file
          "prolix.css": "prolix.less"
        }
      }
    },
    watch: {
      	styles: {
            // Which files to watch (all .less files recursively in the less directory)
        	files: ["*.less"],
        	tasks: ['less'],
        	options: {
        	  	livereload: true,
        	}
      	}
    },
	concat: {
options: {
      	stripBanners: true,
      		banner: '/* all changes made here will be overwritten eventually*/'
    	},
		js: {	
			src: ['js/jquery-1.7.2.min.js',
			'carousel/transition.js',
			'carousel/carousel.js',
			'js/jquery.isotope.min.js',
			'js/prolix.js',
			'jquery.magnific-popup.min.js'],	
			dest: 'concat.js',
		},
		css: {
			src: ['style.css',
			'carousel/carousel.css',
			'carousel/magnific-popup.css'
			],
			dest: 'concat.css',		
		},
	},
  });
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('default', ['watch']);
};