<?php
include_once('header.php');

		session_start();
		
	
            require_once("model.php");
            
			$_SESSION['listeEmploye'] = employe_findAll();
			
           
         
		$listeEmploye = $_SESSION['listeEmploye'] ;	
	
?>
<main>
	<div class="w3-container w3-black">
		<h1 >LISTE DES  EMPLOYES</h1>
	</div>
	<div class="buttonAjouter">
		<a href=""><button type="button" class="btn btn-primary " data-toggle="button" aria-pressed="false" >
  		Ajouter
		</button></a>
	</div>
	<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date de naissance</th>
	  <th scope="col">Fonction</th>
	  <th scope="col">Email</th>
	  <th scope="col">Salaire</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php 
						if ( sizeof($listeEmploye) > 0 ) {
							foreach ($listeEmploye as $employe ) {
					?>	
    <tr>
      <td><?php echo $employe['ID_employe'];?></td>
      <td><?php echo $employe['nom_employe'];?></td>
      <td><?php echo $employe['prenom_employe'];?></td>
      <td><?php echo $employe['date_de_naissance'];?></td>
	  <td><?php echo $employe['Id_fonction'];?></td>
	  <td><?php echo $employe['email'];?></td>
	  <td><?php echo $employe['salaire'];?></td>
	  <td><a href=""><i class="fas fa-user-edit"></i>&nbsp;&nbsp;</button></a>&nbsp;&nbsp;
	  <a href=""><i class="fas fa-user-times"></i>&nbsp;&nbsp;</button></a>&nbsp;&nbsp;
	  <a href=""><i class="fas fa-info"></i>&nbsp;&nbsp;</button></a>&nbsp;&nbsp;
	  </td>

    </tr>
	<?php
						} } else { ?>
							<tr>
								<td> </td>
								<td><label class="w3-text-red">La liste est vide. Aucun employé saisi</label></td>
								<td></td>
							</tr>
					<?php		
						}
					?>
    
  </tbody>
</table>
    </main>    
    <?php
  include_once('footer.php');
  ?>