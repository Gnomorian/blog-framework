<?php
if(!empty($result)) {
  echo($result);
}
?>

<form method="post">
  <table>
      <th colspan='2'>Login</th>
      <tr>
          <td><label for="username">Username</label></td>
          <td><input name="username" id="username" /></td>
      </tr>
      <tr>
          <td><label for="password">Password</label></td>
          <td><input type="password" name="password" id="password" /></td>
      </tr>
      <tr>
          <td></td>
          <td><input type="submit" value="Login" /></td>
      </tr>
  </table>
</form>
