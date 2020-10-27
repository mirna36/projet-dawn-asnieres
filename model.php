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

	function employe_Insert( $nomEmploye, $prenomEmploye, $da, $siteMonument, $dateCreation, $idTypeMonument ) {
		
		// sécurisation des données
		$vNomMonument = filter_var($nomMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vArrMonument = $arrMonument;
		$vAdrMonument = filter_var($adrMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vSiteMonument = filter_var($siteMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vDateCreation = $dateCreation;
		$vIdTypeMonument = $idTypeMonument;
		$vMonumentId = '';

		// prepare requête sql 
		$reqSql = "insert into monument values (:vMonumentId, :vNomMonument," .
					" :vArrMonument, :vAdrMonument, :vSiteMonument, :vDateCreation," . 
					" :vIdTypeMonument )";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vMonumentId', $vMonumentId, PDO::PARAM_INT);
			$stmt->bindParam(':vNomMonument', $vNomMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vArrMonument', $vArrMonument, PDO::PARAM_INT);
			$stmt->bindParam(':vAdrMonument', $vAdrMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vSiteMonument', $vSiteMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vDateCreation', $vDateCreation, PDO::PARAM_STR);
			$stmt->bindParam(':vIdTypeMonument', $vIdTypeMonument, PDO::PARAM_INT);
			
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();
			
		} catch(PDOException $error){
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
		
		//fermer la connexion
		$cnx = null;			
	}
	
?>