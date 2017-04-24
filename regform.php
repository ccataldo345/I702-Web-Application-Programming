<?php
require_once "config.php";
include "header.php";
?>
<h3>REGISTRATION FORM</h3>

<form method="post" action="regsubmit.php">
  <pre>
  <div>
    <label for="email">E-mail: </label>
    <input type="email" name="email" required/>

    <label for="password">Password: </label>
    <input type="password" name="password" required/>

    Country:
    <select name="country">
      <option value="ee">Estonia</option>
      <option value="lt">Latvia</option>
      <option value="lv">Lithuania</option>
      <option value="lv">Europe</option>
      <option value="lv">World</option>
    </select>

    <label for="phone">Telephone: </label>
    <input type="tel"/>

    <label for="vatin">VAT: </label>
    <input type="text" pattern="([A-Z0-9]{4,14})?$"/>

    <label for="dob">Date of birth: </label>
    <input type="date" name="dob" placeholder="dd/mm/yyyy" required/>

    <label for="first_name">First name: </label>
    <input type="text" name="first_name" required/>

    <label for="last_name">Last name: </label>
    <input type="text" name="last_name" required/>

  <br />

    <input type="submit"/>
  </div>
  </pre>

</form>

  <?php include "footer.php" ?>