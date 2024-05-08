const scssContext = require.context("../templates", true, /.*\.scss$/);
scssContext.keys().forEach(scssContext);
