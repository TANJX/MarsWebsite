const notifier = require('node-notifier');
const path = require('path');
const chokidar = require('chokidar');
const debounce = require('lodash.debounce');

const {
  srcPath,
  templateFolder,
  styleFolder,
  scriptFolder,
  staticFolder,
} = require('./path');

const {
  renderTemplate,
  renderStyle,
  renderScript,
  copyStatic,
  cleanPrepareDist,
  c_log,
  c_error,
} = require('./lib');


const d_renderTemplate = debounce(renderTemplate, 200);
const d_renderStyle = debounce(renderStyle, 200);
const d_renderScript = debounce(renderScript, 200);
const d_copyStatic = debounce(copyStatic, 200);

notifier.notify('Start Mars Inc. debugging.');

// clean
c_log('Removing old files');

cleanPrepareDist();

d_renderTemplate();
d_renderStyle();
d_renderScript();
d_copyStatic();

chokidar.watch(srcPath).on('all', (event, path) => {
  // addDir src/style/component
  const parts = path.split('/');
  if (parts.length < 3) return;

  let result;
  if (parts[1] === templateFolder) {
    result = d_renderTemplate();
  } else if (parts[1] === styleFolder) {
    result = d_renderStyle();
  } else if (parts[1] === scriptFolder) {
    result = d_renderScript();
  } else if (parts[1] === staticFolder) {
    d_copyStatic();
  }
  if (result) c_log({ result })
  if (result && !result.success) {
    c_error('error');
    notifier.notify({
      title: 'Compile Error',
      message: result.errorFiles.join(', '),
    });
  }
});

c_log('Start listening\n');
