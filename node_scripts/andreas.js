require("esbuild")
	.build({
		entryPoints: ["test/input_typescript.ts"],
		outfile: "test/build/output.js",
		bundle: true,
		loader: { ".ts": "ts" },
		watch: true,
	})
	.then(() => console.log("⚡ Done"))
	.catch(() => process.exit(1));
