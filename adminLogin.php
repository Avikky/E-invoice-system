<?php
include 'includes/header.php';

 ?>

<section class="container" id="landingbody">
  <div class="adminSection">
    <!--success msg from signup page-->
   <?php if(isset($_GET['value'])) : ?>
     <div class="card-small green center-align" id="">
        <p class="flow-text white-text"><?php echo $_GET['value']; ?></p>
     </div>
   <?php endif; ?>
    <h3 class="response red-text flow-text"></h3>
    <div class="">
      <h3 class="center-align">Admin</h3>
    </div>
    <form class="" action="adminLoginScript.php" method="post">
      <div class="browser-default name-field center">
        <input type="text" name="name" placeholder="Username" class="browser-default">
      </div>
      <div class="browser-default pwd-field center">
        <input type="password" name="pwd" placeholder="Password" class="browser-default">
      </div>
      <div class="send" >
        <button type="submit" name="submit" class="center orange white-text btn btn-flat">Login</button>
      </div>
      <a href="adminSignup.php" class="orange-text right">Register as an admin here</a>
    </form>
  </div>
</section>

 <?php
 include 'includes/footer.php';
  ?>
