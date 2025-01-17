const http = require('http');

const hostname = '127.0.0.1';
const port = 3005;

const server = http.createServer((req, res) => {  
  
  console.log(`Server created`);
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('<h1>Hello World from Kazan 2023</h1>');
  
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});