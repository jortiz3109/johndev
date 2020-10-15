module.exports = {
    methods: {
        hasError(key, errorBag) {
            return !!(this.getError(key, errorBag));
        },
        getError(key, errorBag) {
            return key.split('.').reduce((t, i) => t[i] || null, errorBag);
        }
    },
}
