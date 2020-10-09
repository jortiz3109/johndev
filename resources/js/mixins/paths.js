module.exports = {
    methods: {
        webRoute(path) {
            return this.mergeRoute(window._sitePath, path);
        },
        apiRoute(path) {
            return this.mergeRoute(window._apiPath, path);
        },
        mergeRoute(base, path) {
            if (path.startsWith('/')) {
                path = path.slice(1);
            }

            return [base, path].join('/');
        }
    },
}
