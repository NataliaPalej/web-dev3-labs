<?php
function getWines() {
	if (isset($_GET['sort'])){
		$col=$_GET['sort'];
	}
	else{
		$col="name";
	}
	$query = "SELECT * FROM wine ORDER BY "."$col";
	try {
	global $db;
		$wines = $db->query($query);  
		$wine = $wines->fetchAll(PDO::FETCH_ASSOC);
		header("Content-Type: application/json", true);
		echo '{"wines": ' . json_encode($wine) . '}';
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
$query = "SELECT * FROM wine WHERE name LIKE ". '"%'.$name.'%"'." ORDER BY name";
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

// Create methods to post, update and delete wine
function updateWine($name) {
$query = "SELECT * FROM wine WHERE name LIKE ". '"%'.$name.'%"'." ORDER BY name";
            try {
                global $db;
        
            } catch (Exception $ex) {

            }
}
?>