<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Arasket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('assets/img/fond.jpeg');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 80px;
            width: 500px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 99%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f7f7f7;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
        .summary {
            margin-top: 20px;
            text-align: center;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vos reservations</h2>
        <table>
            <tr>
                <th>numero de chambre</th>
                <th>date debut</th>
                <th>date fin</th>
                <th>Etat</th>
                <th>prix/nuit</th>
                <th>prix du sejour</th>
                
            </tr>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= $reservation['numeroChambre'] ?></td>
                <td><?= $reservation['dateReservation'] ?></td>
                <td><?= $reservation['dateFin'] ?></td>
                <?php $date = date('Y-m-d H:i:s'); ?>
                <?php if($reservation['statutReservation'] == 'en cours de validation') : ?>
                    <td>en attente</td>    
                <?php elseif  ($date > $reservation['dateFin']): ?>
                    <td>Expiré</td>
                <?php else:?>
                    <td>En cours</td>
                <?php endif;?>
                <td><?= $reservation['montant']?></td>
                <td><?= $reservation['montantApayer'] ?></td>
                
            </tr>
            <?php endforeach;?>
        </table>
        
        <div class="summary">
            <button>Résumé</button>
        </div>
    </div>
</body>
</html>