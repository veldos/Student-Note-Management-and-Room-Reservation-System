<h2>Reserver une salle</h2>

<form action="" method="post">

  <label class="my-form-label" for="email">Entrer Votre Email : </label>
  <input class="my-form-input" type="email" name="email">
  <div id="email">
    <?= $error['email'] ?? " " ?>
  </div>

  <label class="my-form-label" for="motif">Entrer le motif de Reservation : </label>
  <input class="my-form-input" type="text" name="motif">
  <div id="motif">
    <?= $error['motif'] ?? " " ?>
  </div>

  <label class="my-form-label" for="salle_id">Selectionnz la salle : </label>
  <select name="salle_id">
    <?php
    foreach ($salles as $value) {
      ?>
      <option value="<?= $value[0]; ?>"><?= $value[1]; ?></option>
    <?php } ?>
  </select>
  <div id="salle">
    <?= $error['salle'] ?? " " ?>
  </div>

  <label class="my-form-label" for="date">Entrer la date prevue : </label>
  <input class="my-form-input" type="date" name="date">
  <div id="Edate">
    <?= $error['date'] ?? " " ?>
  </div>


  <label for="creneau">Selectionnz un creneau : </label> <br>

  <input type="radio" name="creneau" value="Matin">
  <label for="matin">Matin</label><br>

  <input type="radio" name="creneau" value="soir">
  <label for="creneau">Soir</label><br>
  <div id="creneau">
    <?= $error['creneau'] ?? " " ?>
  </div>

  <input type="submit" class="my-form-button" value="Envoyer">

  <input type="reset" class="my-form-button" value="Annuler">

</form>