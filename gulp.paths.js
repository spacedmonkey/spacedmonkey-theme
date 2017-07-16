module.exports = {
    templates: {
        css: {
            src: 'assets/scss/*.scss',
            dest: 'assets/css/'
        },
        js: {
            src: [
                    'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
                    'assets/js/*.javascript'
            ],
            dest: 'assets/js/'
        }
    }
};
