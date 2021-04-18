module.exports = {
    "plugins": [
        "eslint-plugin-vue"
    ],
    extends: [
        // add more generic rulesets here, such as:
        // 'plugin:vue/base',
        // 'plugin:vue/essential',
        // 'plugin:vue/strongly-recommended',
        'plugin:vue/recommended'
    ],
    "parser": "vue-eslint-parser",
    "parserOptions": {
        "parser": "babel-eslint",
        "sourceType": "module",
        "ecmaVersion": 2018,
    },
    "rules": {
        "vue/html-indent": ["error", 4],
        "vue/script-indent": ["error", 4],
        "vue/html-closing-bracket-newline": ["error", {
            "singleline": "never",
            "multiline": "never"
        }],
        "vue/max-attributes-per-line": ["error", {
            "singleline": 10,
            "multiline": {
                "max": 1,
                "allowFirstLine": false
            }
        }]
    },
    "overrides": [
        {
            "files": ["*.vue"],
            "rules": {
                "indent": "warn"
            }
        }
    ]
};
