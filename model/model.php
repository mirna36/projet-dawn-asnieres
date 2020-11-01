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
	function fonction_findAll(){

		//preparation de la requete d'extraction de tous les enregistrements
		$reqSql = "select * from fonction";

		//connexion  la base de données
		$cnx = connect_db();
	
		$listeFonction = array();
		
		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
		
			//exécution
			$stmt->execute();
		
			$listeFonction = $stmt->fetchAll();

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
		return $listeFonction;
		
		

	}
	

	function employe_Insert( $nomEmploye, $prenomEmploye, $dateNaissance, $email, $fonction, $salaire ) {
		
		// sécurisation des données
		$vNomEmploye = filter_var($nomEmploye, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vPrenomEmploye = filter_var($prenomEmploye, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vDateNaissance = $dateNaissance;
		$vEmail = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vFonction = $fonction;
		$vSalaire = $salaire;
		$vEmployeId = '';
		
		// prepare requête sql 
		$reqSql = "INSERT into employe values (:vIdEmploye, :vNomEmploye, :vPrenomEmploye, :vDateNaissance, :vFonction, :vEmail,:vSalaire)";
					

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
			
							
			// bind parameters
			$stmt->bindParam(':vNomEmploye', $vNomEmploye, PDO::PARAM_STR);
			$stmt->bindParam(':vPrenomEmploye', $vPrenomEmploye, PDO::PARAM_STR);
			$stmt->bindParam(':vDateNaissance', $vDateNaissance, PDO::PARAM_STR);
			$stmt->bindParam(':vEmail', $vEmail, PDO::PARAM_STR);
			$stmt->bindParam(':vFonction', $vFonction, PDO::PARAM_STR);
			$stmt->bindParam(':vSalaire', $vSalaire, PDO::PARAM_STR);
			$stmt->bindParam(':vIdEmploye', $vEmployeId, PDO::PARAM_INT);
			
			
			//exécution
			$stmt->execute();
			var_dump($stmt); 
			
			//fermeture du curseur
			$stmt->closeCursor();
			
		} catch(PDOException $error){
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
		
		//fermer la connexion
		$cnx = null;			
	}
	function employe_Find( $id ) {
	
		$vId = $id;
		
		// preparation de la requête sql 
		$reqSql = "select * from employe where ID_employe = :vId";

		//initialisation de $monumenttrouve
		$employeTrouve = array();

		try{
			//établit la connexion à la bdd
			$cnx = connect_db();
			
			//préparation à l'exécution de la requete
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vId', $vId, PDO::PARAM_INT);
			
			//exécution
			$stmt->execute();
			$employeTrouve = $stmt->fetch();
			
			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: ../../controllers/monument/MonumentListerAccept.php" );
		}
		
		//fermer la connexion
		$cnx = null;	
		return $employeTrouve;
	}

	
	function employe_Update($id, $nomEmploye, $prenomEmploye, $dateNaissance, $email, $fonction, $salaire ) {
		$vEmployeId = $id;
		// sécurisation des données
		$vNomEmploye = filter_var($nomEmploye, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vPrenomEmploye = filter_var($prenomEmploye, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vDateNaissance = $dateNaissance;
		$vEmail = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vFonction = $fonction;
		$vSalaire = $salaire;
		$vEmployeId = '';
		
		// prepare requête sql 
		$reqSql = "UPDATE employe SET ( nom_employe =:vNomEmploye, prenom_employe =:vPrenomEmploye, date_de_naissance  =:vDateNaissance, Id_fonction = :vFonction, email  =:vEmail, salaire  = :vSalaire)";
					

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
			
							
			// bind parameters
			$stmt->bindParam(':vNomEmploye', $vNomEmploye, PDO::PARAM_STR);
			$stmt->bindParam(':vPrenomEmploye', $vPrenomEmploye, PDO::PARAM_STR);
			$stmt->bindParam(':vDateNaissance', $vDateNaissance, PDO::PARAM_STR);
			$stmt->bindParam(':vEmail', $vEmail, PDO::PARAM_STR);
			$stmt->bindParam(':vFonction', $vFonction, PDO::PARAM_STR);
			$stmt->bindParam(':vSalaire', $vSalaire, PDO::PARAM_STR);
			$stmt->bindParam(':vIdEmploye', $vEmployeId, PDO::PARAM_INT);
			
			
			//exécution
			$stmt->execute();
			var_dump($stmt); 
			
			//fermeture du curseur
			$stmt->closeCursor();
			
		} catch(PDOException $error){
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
		
		//fermer la connexion
		$cnx = null;			
	}
	

	

	
	function employe_Delete($id){

		$vEmployeId = $id;

		// prepare requête sql 
		$reqSql = "delete from employe " .
				  " where ID_employe = :vEmployeId";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vEmployeId', $vEmployeId, PDO::PARAM_INT);
			
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
	
