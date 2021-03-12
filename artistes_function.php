<?php 
	

	Function getArtiste($id){
		require("connection.php");
		$request = $bdd->prepare('SELECT artistes_nom, artistes_description FROM artistes WHERE artistes_ID = :array_id');
		$request->execute(array(':array_id' => $id));

		$resultat = $request;

		$bdd = NULL;
		return $resultat;
	}

	function ajoutArtistes($nom, $descrip){
		require("connection.php");
	$requestEnvoi = $bdd->prepare('INSERT INTO artistes(artistes_nom, artistes_description, artistes_photo) VALUES(:array_nom , :array_desc, "")');
	$requestEnvoi->execute(array(':array_nom' => $nom, ':array_desc' => $descrip));

	$bdd = NULL;

}

function updateArtistes($id, $nom, $descrip){
	require("connection.php");
	$requestEnvoi = $bdd->prepare('UPDATE artistes SET artistes_nom = :array_nom, artistes_description = :array_desc WHERE artistes_ID = :array_id');
	$requestEnvoi->execute(array('array_id' => $id, ':array_nom' => $nom, ':array_desc' => $descrip));
	$bdd = NULL;
}

function deleteArtiste($id){
	require("connection.php");
	$request = $bdd->prepare('DELETE FROM artistes WHERE artistes_ID = :array_id');
	$request->execute(array(':array_id' => $id));

	$bdd = NULL;


}

function showArtistes(){
	require("connection.php");
	$request = $bdd->prepare('SELECT * FROM artistes');
	$request->execute();

	$resultat = $request;

	$bdd = NULL;
	return $resultat;
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}




 ?>