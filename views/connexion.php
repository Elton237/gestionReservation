<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Dream</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/img/fond-admin.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 300px;
            text-align: center;
        }

        .form-container h1 {
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        .form-container input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #ff7f50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #ff6347;
        }
    </style>
<body>
    <div >
        
        
        <!-- /. NAV SIDE  -->
        
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Connexion
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
                
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                                    <form role="form" action="index.php?action=connexion" method="POST">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Matricule</label>
                                            <input type="password" class="form-control" name="matricule">
                                        </div>       
                                   
                                        <button type="submit" class="btn btn-default">Se connecter</button>
                                        <button type="reset" class="btn btn-default">Annuler</button>
                                    </form>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
