const colors = require("tailwindcss/colors");

module.exports = {
    mode: "jit",
    purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Open Sans", "sans-serif"],
            },
            colors: {
                fuchsia: colors.fuchsia,
                orange: colors.orange,
                teal: colors.teal,
                rose: colors.rose,
            },
        },
    },
    variants: {},
    plugins: [
        require("@tailwindcss/ui"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/line-clamp"),
    ],
};
