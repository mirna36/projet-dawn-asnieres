<?php

	require_once("connexion.php");
	
	function employe_findAll(){

		//preparation de la requete d'extraction de tous les enregistrements
		$reqSql = "select * from employe";

		//connexion  la base de données
		$cnx = connect_db();
	
		$listeEmploye = array();
		
		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
		
			//exécution
			$stmt->execute();
		
			$listeEmploye = $stmt->fetchAll();

			//fermeture du curseur
			$stmt->closeCursor();
		
		} catch(PDOException $error){
			//$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			//$_SESSION['message_erreur'] = $message_erreur;
			//Header("Location: PageErreur.php" );
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
	
		//fermer la connexion
		$cnx = null;	
		return $listeEmploye;

	}	
	
?>