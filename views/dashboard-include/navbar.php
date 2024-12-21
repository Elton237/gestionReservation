<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="<?php echo (isset($_GET['action']) && $_GET['action'] == 'accueil') ? 'active-menu' : ''; ?>" href="index.php?action=accueil"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  class="<?php echo (isset($_GET['action']) && $_GET['action'] == 'ajoutreservation') ? 'active-menu' : ''; ?>" href="index.php?action=ajoutreservation"><i class="fa fa-desktop"></i>Nouvelle reservation</a>
                    </li>
					<li>
                        <a class="<?php echo (isset($_GET['action']) && $_GET['action'] == 'ajoutchambre') ? 'active-menu' : ''; ?>" href="index.php?action=ajoutchambre"><i class="fa fa-bar-chart-o"></i> Nouvelle chambre</a>
                    </li>
                    <li>
                        <a class="<?php echo (isset($_GET['action']) && $_GET['action'] == 'listechambrepersonnel') ? 'active-menu' : ''; ?>" href="index.php?action=listechambrepersonnel"><i class="fa fa-qrcode"></i> listes des chambres</a>
                    </li>
                    
                    <li>
                        <a class="<?php echo (isset($_GET['action']) && $_GET['action'] == 'ajoutercategorie') ? 'active-menu' : ''; ?>" href="index.php?action=ajoutercategorie"><i class="fa fa-table"></i> Ajouter une categorie</a>
                    </li>
                    <li>
                        <a class="<?php echo (isset($_GET['action']) && $_GET['action'] == 'listecategorie') ? 'active-menu' : ''; ?>" href="index.php?action=listecategorie"><i class="fa fa-edit"></i> liste des categories de chambres </a>
                    </li>


                    
                    <li>
                        <a href="#"><i class="fa fa-fw fa-file"></i> Historique de reservation</a>
                    </li>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const links = document.querySelectorAll('#lien');

                            links.forEach(link => {
                                link.addEventListener('click', function() {
                                    links.forEach(l => l.classList.remove('active-menu'));
                                    this.classList.add('active-menu');
                                });
                            });
                        });
                    </script>
                </ul>

            </div>

        </nav>