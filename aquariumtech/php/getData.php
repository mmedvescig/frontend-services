<?php

include '../utils/databasefunctions.php';

include($_SERVER['DOCUMENT_ROOT'].'/utils/databasefunctions.php');

$MySQLServer = 'localhost';
$MySQLUser = 'technetium';
$MySQLPassword = '8wGWL2XDUG5T8Y23';
$MySQLDatabase = 'technetium';
$MySQLQuery = "
SELECT *
FROM (

	SELECT *
	FROM `aquariumtech`
	ORDER BY timeStamp DESC
	LIMIT 20

)sub
ORDER BY timeStamp ASC
  ";

$results = queryMySQLDatabase($MySQLServer, $MySQLUser, $MySQLPassword, $MySQLDatabase, $MySQLQuery);

//echo $MySQLQuery;
echo json_encode($results);

/*
$MySQLQuery = "
SELECT *
FROM (

	SELECT timeStamp, zigbeeId, ROUND (AVG( temperature ),2) as temperature
	FROM `aquariumtech`
	WHERE timeStamp > date_sub(now(), interval 30 minute)
	GROUP BY HOUR( timeStamp ) , MINUTE( timeStamp )
	ORDER BY timeStamp DESC

)sub
ORDER BY timeStamp ASC
  ";
*/

?>
