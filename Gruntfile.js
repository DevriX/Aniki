module.exports = function (grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				options: {
					style: 'compact',
					cacheLocation: 'assets/sass/.cache-location',
				},
				files: [{
					'assets/css/master.css': 'assets/sass/master.scss',
				}],
			},
		},

		autoprefixer:{
			dist: {
				files: {
					'assets/css/master.css': 'assets/css/master.css',
				},
			},
		},

		watch: {
			scripts: {
				files: ['assets/**/*.js', '!assets/scripts/scripts.min.js'],
				tasks: ['jshint', 'uglify'],
			},
			css: {
				files: 'assets/**/*.scss',
				tasks: ['sass', 'autoprefixer', 'cssmin'],
			},
		},

		cssmin: {
			options: {
				shorthandCompacting: false,
				roundingPrecision: -1
			},
			target: {
				files: {
					'assets/css/master.min.css': ['assets/css/master.css']
				}
			}
		},

		uglify: {
			target: {
				files: { 
					// Output file
					'assets/scripts/scripts.min.js':
					[
						// The primary scripts.js file for most general small things.
						'assets/scripts/scripts.js', 
						
						// All include files. Used for nicer separation.
						'assets/scripts/inc/**/*.js',
						
						// Detect browser supported technologies. Custom build might be required.
						'assets/scripts/vendor/modernizr.min.js'
					]
				}
			}
		},

		jshint: {
			all: ['Gruntfile.js', 'assets/scripts/scripts.js'],
		},
	});

	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['watch']);
	grunt.registerTask('css', ['sass', 'autoprefixer']);
	grunt.registerTask('minify', ['cssmin', 'uglify']);
};
