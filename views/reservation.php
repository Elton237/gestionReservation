<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/img/fond-admin.jpeg') no-repeat center center fixed;
            background-size: cover;
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
</head>
<body>
    <div class="form-container">
        <h1>Réservation</h1>
        <form action="index.php?action=creereservation" method="POST">
            <label for="date-debut">Date de début :</label>
            <input type="datetime-local" id="date-debut" name="dateReservation" required>
            
            <label for="date-fin">Date de fin :</label>
            <input type="datetime-local" id="date-fin" name="dateFin" required>
        
            <input type="hidden" id="date-fin" name="idClient" value="<?php echo $_GET['idClient']; ?>" readonly>

            <input type="hidden" id="date-fin" name="idChambre" value="<?php echo $_GET['idChambre']; ?>" required>
            
            <input type="hidden" id="date-fin" name="statutReservation" value="en cours de validation" required>

            <button type="submit">Réserver</button>
        </form>
    </div>
</body>
</html>
