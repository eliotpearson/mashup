Assumptions:

1. MongoDB is installed
2. Apache server with php5 is installed
3. MongoDB php driver is installed
4. Apache httpd server serves on port 80
5. Files are loading into a mashup directory

Running the application:

1. Download and cleanse the data

2. Import data into MongoDB

/usr/local/mongodb/bin/mongoimport -d mashup -c cameras --type csv --file ~/Downloads/Baltimore_Fixed_Speed_Cameras.csv --headerline

3. CURL results into a KML file

curl http://localhost/mashup/test.php > /Library/WebServer/Documents/mashup/cameras.kml 

