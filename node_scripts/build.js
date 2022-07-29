//requiring path and fs modules
const path = require("path");
const fs = require("fs");
//joining path of directory
const directoryPath = path.join("javascript");
//passsing directoryPath and callback function
let entryPoints = [];

let minify = false;
let watch = false;

if (process.argv[2] === "--minify") {
	minify = true;
}
if (process.argv[2] === "--watch") {
	watch = true;
}

const getEntryPoints = () => {
	fs.readdir(directoryPath, { withFileTypes: true }, function (err, dirents) {
		//handling error
		if (err) {
			return console.log("Unable to scan directory: " + err);
		}
		const files = dirents
			.filter((dirent) => dirent.isFile())
			.map((dirent) => dirent.name);
		// use filesNames
		console.log(files);
		//listing all files using forEach
		files.forEach(function (file) {
			// Do whatever you want to do with the file
			entryPoints.push(directoryPath + "/" + file);
		});
		//This runs after pushing to entryPoints!
		console.log(entryPoints);
		build();
	});
};

/* Runs getEntryPoints() function */
getEntryPoints();

const build = () => {
	require("esbuild")
		.build({
			entryPoints,
			//entryPoints: ["test/input1.js", "test/input2.js"],
			//entryPoints: ["test/input1.js", "test/input2.js"],
			outdir: "theme/js",
			outExtension: { ".js": ".min.js" },
			bundle: true,
			minify,
			watch,
		})
		.then(() => console.log("⚡ Done with minify", minify, "and watch", watch))
		.catch(() => process.exit(1));
};
