<table id="my-nice-table">
<thead>
  <td>Authentifier avec le token</td>
  <td>Authentifier avec l'Email Academyque</td>
</thead>
  <tbody>
  <td>
    <form action="" method="post">
      <label class="my-form-label" for="token"> Votre token : </label>
      <input name="user_token" type="text" placeholder="Token">
      <input class="my-form-button" type="submit" value="Envoiye">
      <div><?= $ErrorToken ?></div>
    </form>
  </td>

  <td>  
  <form action="" method="post">
      <label class="my-form-label" for="token">Votre Email Academique : </label>
      <input name="user_mail" type="email" placeholder="Email@usmba.ac.ma">
      <input class="my-form-button" type="submit" value="Envoiye">
      <div><?= $ErrorEmail ?></div>
    </form>
  </td>

  </tbody>
</table>