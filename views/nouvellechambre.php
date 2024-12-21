<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>


        <div id="page-wrapper">
            <div id="page-inner">
                 <h2>Ajouter une chambre</h2>
                    <form action="index.php?action=ajoutchambre" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom">numero chambre</label>
                            <input type="text" id="idClient" name="numeroChambre" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">image</label>
                            <input type="file" id="prenom" name="imageChambre" required>
                        </div>
                        <div class="form-group">
                            <label for="categorie"> choisir une categorie</label>
                            <select id="idCategorie" name="idCategorie" required>
                                
                                <?php foreach ($categories as $categorie): ?>
                                    <option value="<?= $categorie['idCategorie'] ?>"><?= $categorie['nomCategorie'] ?></option>
                                <?php endforeach; ?>
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">Etage</label>
                            <select name="idEtage" id="motdepasse">
                                <?php foreach($rtages as $et): ?>
                                    <option value="<?= $et['idEtage'] ?>"><?= $et['nomEtage'] ?></option>
                                <?php endforeach; ?>    
                            </select>
                            
                        </div>
                        <div class="button-group">
                            <button type="submit">Soumettre</button>
                            <button type="button" class="cancel">Annuler</button>
                        </div>
                    </form>


                

                


                

                

<?php require_once 'dashboard-include/footer.php'; ?>