

<h1>Liste des réservations actives</h1>

<hr />
<div align="right"><b><a href ="index.php">Réserver une salle</a> </b></div>
<table id='my-nice-table'>
			<thead> 
				<td>id</td>
				<td>Email Createur </td>
				<td>Motif</td>
				<td>Salle</td>
				<td>Date</td>
				<td>Créneau</td>
				<td>Action</td>
		
			</thead>	
		 
	<?php foreach ($Reservations as $R) { ?>	 
			<tbody>
				<tr>
					<td> <?= $R["id"] ?></td>
					<td> <?= $R["Email"] ?> </td>
					<td> <?= $R["Motif"] ?> </td>
					<td> <?= $R["Salle_id"] ?> </td>
					<td> <?= $R["Date"] ?> </td>
					<td> <?= $R["Creneau"] ?> </td>
					<td> <a href = "index.php?action=remove&Reservation_id=<?= $R["id"] ?>">Supprimer</a> </td>
				</tr>
				
				
			</tbody>
	<?php }?>
		
</table>