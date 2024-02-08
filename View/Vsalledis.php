
<h2>Salle disponible</h2>
<form action="" method="post">
<pre>
Salle: <?= $salle ?> <input type = "hidden" value ="<?= $salle ?>" /><br />
Date: <?=  $date  ?> <input type = "hidden" value ="<?= $date ?>" /><br />
Créneau: <?= $creneau   ?> <input type = "hidden" value ="<?= $creneau ?>" /><br />

<a class="check" href=<?= $lien?> >check in </a> <input type ="button" onclick="javascript:history.go(-1)" value="Retour à la page précédente" />
</pre>