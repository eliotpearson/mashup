Assumptions:

-MongoDB is installed
-Apache server with php5 is installed
-MongoDB php driver is installed


1. Download and cleanse the data

2. Import data into MongoDB

/usr/local/mongodb/bin/mongoimport -d mashup -c cameras --type csv --file ~/Downloads/Baltimore_Fixed_Speed_Cameras.csv --headerline

3. CURL results into a KML file

curl http://localhost/test.php > /Library/WebServer/Documents/cameras.kml 

