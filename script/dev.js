const notifier = require('node-notifier');
const sass = require('sass');
const pug = require('pug');
const fs = require('fs');
const fw = require('filewatcher');

function getAllFiles(path, ext) {
  const files = [];
  for (const file of fs.readdirSync(path)) {
    if (file.startsWith('_')) continue;
    if (!file.endsWith(ext)) continue;
    files.push(file.replace(ext, ''));
  }
  return files;
}


let pugFiles = getAllFiles('./template', '.pug');
let styleFiles = getAllFiles('./style', '.scss');

let errorFiles = [];
let styleError = false;
let pugError = false;


function renderStyle() {
  console.log('Compile style');
  styleFiles = getAllFiles('./style', '.scss');
  for (const styleFile of styleFiles) {
    console.log(`Rendering ${styleFile}.scss`);
    try {
      const result = sass.renderSync({
        file: `./style/${styleFile}.scss`,
        sourceMap: true,
        outFile: `${styleFile}.css`,
      });
      console.log(`Writing ${styleFile}.css`);
      fs.writeFileSync(`./dist/css/${styleFile}.css`, result.css);
      fs.writeFileSync(`./dist/css/${styleFile}.css.map`, result.map);
    } catch (e) {
      styleError = true;
      errorFiles.push(`${styleFile}.scss`);
      console.log(`Error: ${styleFile}.scss`);
      console.log(e);
    }
  }
}

function renderTemplate() {
  console.log('Compile templates');
  pugFiles = getAllFiles('./template', '.pug');
  for (const pugFile of pugFiles) {
    console.log(`Rendering ${pugFile}.pug`);
    try {
      const html = pug.renderFile(`./template/${pugFile}.pug`, {});
      console.log(`Writing ${pugFile}.html`);
      fs.writeFileSync(`./dist/${pugFile}.html`, html);
    } catch (e) {
      pugError = true;
      errorFiles.push(`${pugFile}.pug`);
      console.log(`Error: ${pugFile}.pug`);
      console.log(e);
    }
  }
}

// copy static files
function copyDir(src, dist) {
  if (!fs.existsSync(dist) || !fs.lstatSync(dist).isDirectory()) {
    fs.mkdirSync(dist);
  }

  const paths = fs.readdirSync(src);
  paths.forEach((path) => {
    const _src = src + '/' + path;
    const _dist = dist + '/' + path;
    console.log(`Copying ${_src}`);
    const stat = fs.statSync(_src);

    // 判断是文件还是目录
    if (stat.isFile()) {
      fs.writeFileSync(_dist, fs.readFileSync(_src));
    } else if (stat.isDirectory()) {
      // 当是目录是，递归复制
      copyDir(_src, _dist);
    }
  });
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

var watcher = fw({
  forcePolling: false,  // try event-based watching first
  debounce: 100,         // debounce events in non-polling mode by 10ms
  interval: 1000,       // if we need to poll, do it every 1000ms
  persistent: true      // don't end the process while files are watched
});


notifier.notify('Start Mars Inc. debugging.');

if (fs.existsSync('./dist')) {
  rmDir('./dist');
}
fs.mkdirSync('./dist');
fs.mkdirSync('./dist/css');

renderStyle();
renderTemplate();

copyDir('./static', './dist');
// ... or a directory
watcher.add('./style');
watcher.add('./template');

console.log('Start listening\n');

watcher.on('change', function (file, stat) {
  errorFiles = [];
  if (file === './template') {
    renderTemplate();
  } else if (file === './style') {
    renderStyle();
  }
  if (errorFiles.length > 0) {
    notifier.notify({
      title: 'Compile Error',
      message: errorFiles.join(', '),
    });
  } else {
    if (styleError) {
      styleError = false;
      notifier.notify({
        title: 'SASS Fixed',
        message: 'Styles were compiled successfully',
      });
    }
    if (pugError) {
      pugError = false;
      notifier.notify({
        title: 'Pug Fixed',
        message: 'Templates were compiled successfully',
      });
    }
  }
  console.log('Updated\n');
  if (!stat) console.log('deleted');
});
