<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>


        <div id="page-wrapper">
            <div id="page-inner">
                 <h2>Ajouter une nouvelle reservation</h2>
                    <form action="index.php?action=ajoutreservation" method="POST">
                        <div class="form-group">
                            <label for="nom">email Client (mettre un point pour separer le nom du prenom)</label>
                            <input type="email" id="idClient" name="emailClient" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="chambreSelect">Chambre</label>
                            <select name="idChambre" id="chambreSelect" onchange="updateMontant()">
                                <?php foreach($chambres as $c): ?>
                                    <option value="<?= $c['idChambre'] ?>" data-montant="<?= $c['montant'] ?>">
                                        <?= $c['nomCategorie'] ?> <?= $c['numeroChambre'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="montant">Montant de la nuitée</label>
                            <input type="text" id="montant" name="montant" required readonly>
                        </div>

                        <script>
                            function updateMontant() {
                                const chambreSelect = document.getElementById('chambreSelect');
                                const montantInput = document.getElementById('montant');
                                
                                const selectedOption = chambreSelect.options[chambreSelect.selectedIndex];
                                const montant = selectedOption.getAttribute('data-montant');
                                
                                montantInput.value = montant ? montant : '';
                            }
                        </script>

                        <div class="form-group">
                            <label for="motdepasse">Date de reservation</label>
                            <input type="datetime-local" id="motdepasse" name="dateReservation" required>
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">Date de fin de sejour</label>
                            <input type="datetime-local"  name="dateFin" required>
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">Statut</label>
                            <select name="statutReservation" >
                                <option value="valider">valider</option>
                                <option value="en cours de validation">en cours de validation</option>
                            </select>
                        </div>
                        <div class="button-group">
                            <button type="submit">Soumettre</button>
                            <button type="button" class="cancel">Annuler</button>
                        </div>
                    </form>

                    <!-- <form action="index.php?action=ajoutclient" method="POST">
                        <div class="form-group">
                            <label for="nom">Nom Client</label>
                            <input type="text" id="idClient" name="nomClient" required>
                        </div>
                        <div class="form-group">
                            <label for="prenom">prenom client</label>
                            <input type="text" id="prenom" name="prenomClient" required>
                        </div>
                        <div class="form-group">
                            <label for="email">email client</label>
                            <input type="number" id="email" name="emailClient" required>
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">numero client</label>
                            <input type="date" id="motdepasse" name="numeroClient" required>
                        </div>
                        <div class="form-group">
                            <label for="motdepasse">matricule client</label>
                            <input type="text" id="motdepasse" name="matriculeClient" required>
                        </div>
                        <div class="button-group">
                            <button type="submit">Soumettre</button>
                            <button type="button" class="cancel">Annuler</button>
                        </div>
                    </form> -->

                

                


                

                

<?php require_once 'dashboard-include/footer.php'; ?>