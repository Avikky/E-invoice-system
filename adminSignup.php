<?php
include 'includes/header.php';
 ?>

<section class="container" id="landingbody">
  <h3 class="response red-text flow-text"></h3>
  <div class="adminSection">
    <div class="">
      <h3 class="center-align">Admin</h3>
    </div>
    <form class="" action="adminSignupScript.php" method="post">
      <div class="browser-default name-field center">
        <input type="text" name="name" placeholder="Username" class="browser-default">
      </div>
      <div class="browser-default pwd-field center">
        <input type="password" name="pwd" placeholder="Password" class="browser-default">
      </div>
      <div class="browser-default pwd-field center">
        <input type="password" name="repwd" placeholder="Comfirm Password" class="browser-default">
      </div>
      <div class="send">
        <button type="submit" name="submit" class="center orange white-text btn btn-flat">Sign Up</button>
      </div>
    </form>
  </div>
</section>

 <?php
 include 'includes/footer.php';
  ?>
