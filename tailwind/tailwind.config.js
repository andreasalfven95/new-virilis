// Set flag to include Preflight conditionally based on the build target.
const includePreflight = "editor" === process.env._TW_TARGET ? false : true;

module.exports = {
	tailwindConfig: "./styles/tailwind.config.js",
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require("./tailwind-typography.config.js"),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		"./theme/**/*.php",
		"./theme/theme.json",
		"./theme/js/*.js",
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			maxWidth: {
				xxs: "12rem",
			},
			height: {
				fullscreenSmallNavbar: "calc(100vh - 4.5rem)",
				fullscreenLargeNavbar: "calc(100vh - 7rem)",
			},
			fontFamily: {
				sans: ["'Lato', Helvetica, sans-serif"],
			},
			colors: {
				/* "regal-blue": "#243c5a", */
			},
			typography: {
				DEFAULT: {
					css: {
						"h1,h2,h3,h4,h5,h6": {
							marginBottom: "1rem",
						},
					},
				},
			},
		},
	},
	corePlugins: {
		// Disable Preflight base styles in CSS targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography.
		require("@tailwindcss/typography"),

		// Extract colors and widths from `theme.json`.
		require("@_tw/themejson")(require("../theme/theme.json")),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require( '@tailwindcss/aspect-ratio' ),
		// require( '@tailwindcss/forms' ),
		// require( '@tailwindcss/line-clamp' ),
	],
};
