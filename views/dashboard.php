<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>


        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>Hotelier</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3><?= $clientsCount ?></h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Clients

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-list fa-5x"></i>
                                <h3><?= $reservationsCount ?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                reservation

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-home fa-5x"></i>
                                <h3><?= $chambresCount ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                chambre

                            </div>
                        </div>
                    </div>
                    
                </div>


                <div class="row">



                </div>
                <!-- /. ROW  -->

                <div class="row">
                   
                    <div class="col-md-13 col-sm-15 col-xs-15">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Liste de reservation
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>date reservation</th>
                                                <th>date de fin</th>
                                                <th>statut reservation</th>
                                                <th>numero chambre</th>
                                                <th>client</th>
                                                <th>total a payer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($reservations as $reservation): ?>
                                            <tr>
                                                <td><?= $reservation['dateReservation'] ?> </td>
                                                <td><?= $reservation['dateFin'] ?> </td>
                                                <td><?= $reservation['statutReservation'] ?></td>
                                                <td><?= $reservation['numeroChambre'] ?></td>
                                                <td><?= $reservation['nomClient'] ?></td>
                                                <td><?= $reservation['montantApayer'] ?>FCFA</td>
                                                <td>
                                                    <div class="button-group">
                                                        <?php if ($reservation['statutReservation'] == "en cours de validation") : ?>
                                                        <button type="submit"><a href="index.php?action=validerreservation&id=<?= $reservation['idReservation'] ?>">Valider</a></button>
                                                        <?php endif; ?>
                                                        <button type="button" class="cancel"><a href="index.php?action=deletereservation&id=<?= $reservation['idReservation'] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cette reservation?');">supprimer</a></button>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

<?php require_once 'dashboard-include/footer.php'; ?>