simple-vhost-index
==================

I wanted to create a directory link class for my virtual hosts on my dev box. 
The features I looked to implement are:
  1. have the index file refer to the server root directory i.e. htdocs
  2. automatically get the correct index files
  3. Be able to ignore index.html in css, js, etc files
  4. make them links
  5. Use PHP iterator classes
  6. Be able to specify which port the host is on
This is a quick and dirty upgrade of my previous implementation.
I will implement S-UI in the future. 
