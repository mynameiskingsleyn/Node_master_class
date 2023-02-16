/*
 * Primary file for API
 *
 */

// Dependencies
var server = require('./lib/server');
var workers = require('./lib/workers');
var cli = require('./lib/cli');

// Declare the app
var app = {};

// Init function
app.init = function(callback){

  // Start the server
  server.init();

  // Start the workers
  workers.init();

  // Start the CLI, but make sure it starts last
  setTimeout(function(){
    cli.init();
    callback();
  },50);


};

// Self executing
//app.init(function(){});

// Self invoking only if required directly, if invoded indirectory it should not self execute
// only self invoked if used ==> node index.js otherwise dont envoke if being requrired.
if(require.main === module){
  app.init(function(){});
}


// Export the app
module.exports = app;
