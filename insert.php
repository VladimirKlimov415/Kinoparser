<?php 

include('parser.php');
$data = doParsing(2016);

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'movies';

$mysqli = new mysqli( $host,$user,$pass,$db );
$mysqli->query("SET NAMES utf8");

for ($i = 0; $i < count($data); $i++ ) {
		$title = $mysqli->escape_string($data[$i]['title']);

		$sql = "INSERT IGNORE INTO movies (title,year,images,director,rating,
            country,genres,actor,runtime)
            VALUES ('$title','{$data[$i]['year']}','{$data[$i]['images']}',
            '{$data[$i]['director']}','{$data[$i]['rating']}','{$data[$i]['country']}',
            '{$data[$i]['genres']}','{$data[$i]['actor']}','{$data[$i]['runtime']}')";

        $mysqli->query($sql) or die($mysqli->error);

        $movies_id = $mysqli->insert_id; 
    
    if ( !$movies_id ) { 
        continue; 
    }

	}


 ?>