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
          "prolix.css": "prolix.less"
        }
      }
    },
	watch: {
	  styles: {
		files: ["*.less"],
		tasks: ["less"],
		options: {
		  livereload: true,
		}
	  },
	  js:{
		files: ["js/prolix.js", "prolix.less"],
		tasks: ["concat"]
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
			  'lightbox/jquery.magnific-popup.min.js',
			  'js/prolix.js'
			 ],
		dest: 'concat.js',
	  },
	  css: {
		src: ['style.css',
			  'carousel/carousel.css',
			  'lightbox/magnific-popup.css'
			 ],
		dest: 'concat.css',
	  },
	}
  });
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');

  grunt.registerTask('default', ['watch']);
};
