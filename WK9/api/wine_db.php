<?php
function getWines() {
	$query = "select * FROM wine ORDER BY name";
	try {
	global $db;
		$wines = $db->query($query);  
		$wines = $wines->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"wine": ' . json_encode($wines) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getWine($id) {
	$query = "SELECT * FROM wine WHERE id = '$id'";
    try {
		global $db;
		$wines = $db->query($query);  
		$wine = $wines->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($wine);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function findByName($name) {
$query = "SELECT * FROM wine WHERE UPPER(name) LIKE ". '"%'.$name.'%"'." ORDER BY name";
    try {
		global $db;
		$wines = $db->query($query);  
		$wine = $wines->fetch(PDO::FETCH_ASSOC);
        header("Content-Type: application/json", true);
        echo json_encode($wine);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
function addWine() {
    global $app;
	$request = $app->request();
	$wine = json_decode($request->getBody());
	$name = $wine->name;
	$grapes = $wine->grapes;
	$country = $wine->country;
	$region = $wine->region;
	$year = $wine->year;
	$description = $wine->description;
	$query= "INSERT INTO wine
                 (name, grapes, country, region, year, description)
              VALUES
                 ('$name', '$grapes', '$country', '$region', '$year', '$description')";
	try {
		global $db;
		$db->exec($query);
		$wine->id = $db->lastInsertId();
		echo json_encode($wine); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function deleteWine($id) {
	$query = "DELETE FROM wine WHERE id=:id";
	try {
		global $db;
		$db->exec($query);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updateWine($id) {
	global $app;
	$request = $app->request();
	$wine = json_decode($request->getBody());
	$name = $wine->name;
	$grapes = $wine->grapes;
	$country = $wine->country;
	$region = $wine->region;
	$year = $wine->year;
	$description = $wine->description;
	$query = "UPDATE wine SET name='$name', grapes='$grapes', country='$country', region='$region', year='$year', description='$description' WHERE id='$id'";
	try {
		global $db;
		 $db->exec($query); 
		 echo json_encode($wine);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

?>