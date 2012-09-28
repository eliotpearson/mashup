<?php
  try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->mashup;

  // access collection
  $collection = $db->cameras;

  // execute query
  // retrieve all documents
  $cursor = $collection->find();

  // iterate through the result set
  // print each document


// Creates an array of strings to hold the lines of the KML file.
$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://earth.google.com/kml/2.1">';
$kml[] = ' <Document>';
$kml[] = ' <Style id="NoneIconStyle">';
$kml[] = ' <IconStyle>';
$kml[] = ' <Icon>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';

// Iterates through the rows, printing a node for each row.
 foreach ($cursor as $obj) {
   $kml[] = ' <Placemark id="placemark' . $obj['_id'] . '">';
   $kml[] = ' <name>' . htmlentities($obj['address']) . '</name>';
   $kml[] = ' <description>camera</description>';
   $kml[] = ' <styleUrl>#NoneIconStyle</styleUrl>';
   $kml[] = ' <Point>';
   $kml[] = ' <coordinates>' . $obj['long'] . ',' . $obj['lat'] . ',0</coordinates>';
   $kml[] = ' </Point>';
   $kml[] = ' </Placemark>';
 } 

// End XML file
$kml[] = ' </Document>';
$kml[] = '</kml>';
$kmlOutput = join("\n", $kml);

header('Content-type: application/vnd.google-earth.kml+xml');
echo $kmlOutput;


  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}

?>