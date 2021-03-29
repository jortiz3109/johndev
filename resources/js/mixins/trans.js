module.exports = {
    methods: {
        trans(key, replace) {
            let translation, translationNotFound = true

            try {
                translation = key.split('.').reduce((t, i) => t[i] || null, window._translations[window._locale].php)

                if (translation) {
                    translationNotFound = false
                }
            } catch (e) {
                translation = key
            }

            _.forEach(replace, (value) => {
                translation = translation.replace(':' + key, value)
            })

            return translation
        }
    },
}
