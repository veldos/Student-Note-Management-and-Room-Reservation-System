
<hr />
<table id='my-nice-table'>
			<thead> 
      <td>Id</td>
      <td>Nom</td>
      <td>Operation</td>
		
			</thead>	
		 
	<?php foreach ($Salle as $R) { ?>	 
			<tbody>
        <tr>
          <td> <?= $R["id"] ?></td>
				  <td> <?= $R["name"] ?> </td>
	
				  <td> <a href = "index.php?action=removeSalle&Salle_id=<?= $R["id"] ?>">Supprimer</a> </td>
        </tr>
				
				
			</tbody>
	<?php }?>
  <tfoot>

    <td class="foot" colspan="3">
      <a href="index.php?action=addSalle">Ajouter Une Salle</a>
    </td>
  </tfoot>
		
</table>
