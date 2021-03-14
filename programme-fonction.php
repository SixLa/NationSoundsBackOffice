<?php 


Function getEvent($id){
    require("connection.php");
    $request = $bdd->prepare('SELECT * FROM event WHERE event_ID = :array_id');
    $request->execute(array(':array_id' => $id));

    $resultat = $request;

    $bdd = NULL;
    return $resultat;
}


function createEvent($date, $ID, $type){
    require("connection.php");
	$requestEnvoi = $bdd->prepare('INSERT INTO event(event_date, fk_scenes_ID, event_type) VALUES(:array_date , :array_scenesID, :array_type)');
	$requestEnvoi->execute(array(':array_date' => $date, ':array_scenesID' => $ID, ':array_type' => $type));

	$bdd = NULL;
}

function getScene(){
    require("connection.php");
	$request = $bdd->prepare('SELECT * FROM scenes');
	$request->execute();

	$resultat = $request;

	$bdd = NULL;
	return $resultat;
}

function getParticipant($id){
    debug_to_console("etape 1");
    require("connection.php");
    $request = $bdd->prepare(
        'SELECT artistes_nom
        FROM artistes
        INNER JOIN participe ON artistes.artistes_ID = participe.fk_artistes_ID
        WHERE participe.fk_event_ID = :array_ID');
	$request->execute(array(':array_ID' => $id));
    $resultat = $request;
    $resultString = "aucun participant";
    
    if($resultat -> rowCount() > 0){
        $resultString = "";
    foreach($resultat as $r){
        $resultString = $resultString. $r[0] . " / ";
        debug_to_console($resultString);
    }
}

	$bdd = NULL;
	return $resultString;

}

function showEvent(){
    require("connection.php");
	$request = $bdd->prepare('SELECT * FROM event');
	$request->execute();

	$resultat = $request;

	$bdd = NULL;
	return $resultat;
}



function deleteEvent($id){
    require("connection.php");
	$request = $bdd->prepare('DELETE FROM event WHERE event_ID = :array_id');
	$request->execute(array(':array_id' => $id));

	$bdd = NULL;

}

function deleteParticipeFromEvent($id){
    require("connection.php");
	$request = $bdd->prepare('DELETE FROM participe WHERE fk_event_ID = :array_id');
	$request->execute(array(':array_id' => $id));

    $bdd = NULL;
}

function deleteParticipe($id){
    require("connection.php");
	$request = $bdd->prepare('DELETE FROM participe WHERE participe = :array_id');
	$request->execute(array(':array_id' => $id));

	$bdd = NULL;

}


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

 ?>