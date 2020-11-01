<?php
include_once('header.php');
session_start();
require_once("../model/model.php");
    $listeFonction = fonction_findAll();
    $employe=$_SESSION['employe'];
    
  

		
	?>

            
	
	

    <main>
        <h1 >MODIFICATION EMPLOYE</h1>
    

 <div class="card-profile shadow-lg p-2 mb-3 bg-white rounded">
    <div class="card-photo">
        <div class="icon-profile col-md-10 float-left" >
               
            <i class="fas fa-user-alt"style="font-size:200px"></i>
            <br><br>
            <div class="custom-file ">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choisir fichier</label>
            </div>
        </div>
    </div>
    
    <div class="card-form ">
        <h2>Profile</h2>

        
        <form action="../Controller/modifierAccept.php" method="post">
				
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomEmploye">Nom</label>
                    <input type="text" class="form-control" name="nomEmploye" value="<?php echo $employe['nom_employe'];?>">
                    
                </div>
                <div class="form-group col-md-6">
                    <label for="prenomEmploye">Prenom</label>
                    <input type="text" class="form-control" name="prenomEmploye" value="<?php echo$employe['prenom_employe'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="dateNaissance">Date de naissance</label>
                    <input type="date" class="form-control" name="dateNaissance" value="<?php echo $employe['date_de_naissance'];?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="xxxx@gmail.com" value="<?php echo $employe['email'];?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Fonction</label>
				<select class="w3-select w3-text-black" name="fonction">
                <option value="0" >Selectionner une fonction</option>
					<?php 
						foreach ( $listeFonction as $fonction ){	
					?>					
					<option name="idFonction" value="<?php echo $fonction['Id_fonction']; ?>"
							<?php
								if ( $fonction['Id_fonction'] == $fonction ) {
									echo $optChoisi;
								}
							?>>
							<?php echo $fonction['libelle_poste']; ?>
					</option>
					<?php 
						}
					?>		
				</select>
                </div>
                <div class="form-group col-md-4">
                    <label for="salaire">Salaire</label>
                    <input type="text" class="form-control" name="salaire" value="<?php echo $employe['salaire']; ?>">
                </div>
               
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary" name="employe">Enregistrement</button>
                <button type="submit" class="btn btn-danger float-right">Reset</button> 
            </div>    
               
        </form>
    </div>    
</div>
</main>


  

<?php
  include_once('footer.php');
  ?>