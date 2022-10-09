const fs = require('fs');
const path = require('path');
const sass = require('sass');
const pug = require('pug');
const UglifyJS = require("uglify-js");
const dayjs = require('dayjs');
const utc = require('dayjs/plugin/utc.js');
const timezone = require('dayjs/plugin/timezone.js');

const {
  srcPath,
  distPath,
  templateFolder,
  styleFolder,
  scriptFolder,
  staticFolder,
} = require('./path');

dayjs.extend(utc);
dayjs.extend(timezone);

function timestamp() {
  return '[' + dayjs().tz('America/Los_Angeles').format() + ']';
}

function c_log(msg) {
  console.log(timestamp() + msg);
}

function c_error(msg) {
  console.error(timestamp() + msg);
}

function getAllFiles(path, ext) {
  const files = [];
  for (const file of fs.readdirSync(path)) {
    if (file.startsWith('_')) continue;
    if (!file.endsWith(ext)) continue;
    files.push(file.replace(ext, ''));
  }
  return files;
}

let rmDir = function (dirPath) {
  const files = fs.readdirSync(dirPath);
  if (files.length > 0)
    for (var i = 0; i < files.length; i++) {
      var filePath = dirPath + '/' + files[i];
      if (fs.statSync(filePath).isFile())
        fs.unlinkSync(filePath);
      else
        rmDir(filePath);
    }
  fs.rmdirSync(dirPath);
};

function copyDir(src, dist) {
  if (!fs.existsSync(dist) || !fs.lstatSync(dist).isDirectory()) {
    fs.mkdirSync(dist);
  }

  const paths = fs.readdirSync(src);
  paths.forEach((path) => {
    const _src = src + '/' + path;
    const _dist = dist + '/' + path;
    c_log(`Copying ${_src}`);
    const stat = fs.statSync(_src);

    // 判断是文件还是目录
    if (stat.isFile()) {
      fs.writeFileSync(_dist, fs.readFileSync(_src));
    } else if (stat.isDirectory()) {
      // 当是目录是，递归复制
      copyDir(_src, _dist);
    }
  });
  console.log();
}

function renderTemplate() {
  c_log('Compile templates');
  success = true;
  errorFiles = [];
  pugFiles = getAllFiles(path.join(srcPath, templateFolder), '.pug');
  for (const pugFile of pugFiles) {
    c_log(`Rendering ${pugFile}.pug`);
    try {
      const html = pug.renderFile(
        path.join(srcPath, templateFolder, `${pugFile}.pug`),
        {},
      );
      c_log(`Writing ${pugFile}.html`);
      fs.writeFileSync(
        path.join(distPath, `${pugFile}.html`),
        html
      );
    } catch (e) {
      success = true;
      errorFiles.push(`${pugFile}.pug`);
      c_error(`Error: ${pugFile}.pug`);
      c_error(e);
    }
  }
  console.log();
  return { success, errorFiles };
}

function renderStyle() {
  c_log('Compile css');
  success = true;
  errorFiles = [];
  styleFiles = getAllFiles(path.join(srcPath, styleFolder), '.scss');
  for (const styleFile of styleFiles) {
    c_log(`Rendering ${styleFile}.scss`);
    try {
      const result = sass.compile(
        path.join(srcPath, styleFolder, `${styleFile}.scss`),
        {
          sourceMap: true,
          logger: sass.Logger.silent, // disable warnings
          style: "compressed",
        }
      );
      c_log(`Writing ${styleFile}.css`);
      fs.writeFileSync(
        path.join(distPath, styleFolder, `${styleFile}.css`),
        `${result.css.toString()}\n/*# sourceMappingURL=${styleFile}.css.map */`,
      );
      fs.writeFileSync(
        path.join(distPath, styleFolder, `${styleFile}.css.map`),
        JSON.stringify(result.sourceMap),
      );
    } catch (e) {
      success = false;
      errorFiles.push(`${styleFile}.scss`);
      c_error(`Error: ${styleFile}.scss`);
      c_error(e);
    }
  }
  console.log();
  return { success, errorFiles };
}

function renderScript() {
  c_log('Compile js');
  success = true;
  errorFiles = [];
  jsFiles = getAllFiles(path.join(srcPath, scriptFolder), '.js');
  for (const jsFile of jsFiles) {
    c_log(`Minify ${jsFile}.js`);
    const jsContent = fs.readFileSync(
      path.join(srcPath, scriptFolder, `${jsFile}.js`),
      "utf8"
    );
    const result = UglifyJS.minify(jsContent);
    if (result.error) {
      success = false;
      errorFiles.push(`${jsFile}.js`);
      c_error(`Error: ${jsFile}.js`);
      c_error(result.error);
    } else {
      c_log(`Writing ${jsFile}.js`);
      fs.writeFileSync(
        path.join(distPath, scriptFolder, `${jsFile}.js`),
        result.code,
      );
    }
  }
  console.log();
  return { success, errorFiles };
}

function cleanPrepareDist() {
  if (fs.existsSync(distPath)) {
    rmDir(distPath);
  }
  fs.mkdirSync(distPath, { recursive: true });
  fs.mkdirSync(path.join(distPath, styleFolder));
  fs.mkdirSync(path.join(distPath, scriptFolder));
}

function copyStatic() {
  copyDir(
    path.join(srcPath, staticFolder),
    distPath,
  );
}

module.exports = {
  getAllFiles,
  rmDir,
  copyDir,
  renderTemplate,
  renderStyle,
  renderScript,
  cleanPrepareDist,
  copyStatic,
  c_log,
  c_error,
};
