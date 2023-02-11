/*
 * Primary file for API
 *
 */

// Dependencies
var http = require('http');
var url = require('url');
var StringDecoder = require(‘string_decoder’).StringDecoder;

 // Configure the server to respond to all requests with a string
var server = http.createServer(function(req,res){

  // Get URL and parse it
  var parsedUrl = url.parse(req.url, true); //
  // Get the path
  var path = parsedUrl.pathname;
  var trimmedPath = path.replace(/^\/+|\/+$/g,'');
  // Get Http Method ...
  var method = req.method.toLowerCase();
  // Get the Query String as object...
  var queryStringObject = parsedUrl.query;
  // Get the headers as on object.
  var headers = req.headers;
  // Get payload if there is any.
  var decoder = new StringDecoder('utf-8');
  let buffer = "";
  req.on('data', function() {
    buffer += decoder.write(data);
  });
  req.on('end', function() {
    buffer += decoder.write(data);

    res.end('Hello World!\n');
    // Send the response
    console.log('request recieved with this payload: '+ buffer)
  })


  // console.log('Request was recieved on this path '+trimmedPath+' method is '+method);
  // console.log('Query string parameters'); console.log(queryStringObject);
  //console.log('request recieved with these headers '+headers);
  // Send the response

  // log what path the user is asking for.

  //res.end('Hello World!\n');

});

// Start the server
server.listen(4000,function(){
  console.log('The server is up and running now');
});
