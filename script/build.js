const {
  renderTemplate,
  renderStyle,
  renderScript,
  copyStatic,
  cleanPrepareDist,
} = require('./lib');

console.log('Start building Mars Inc.');
const startTime = Date.now();

// clean
console.log('Removing old files');
cleanPrepareDist();

renderStyle();
renderTemplate();
renderScript();

// move static files
copyStatic();

const buildTime = Math.round((Date.now() - startTime) / 100) / 10;
console.log(`Mars Inc was built in ${buildTime}s.`);
