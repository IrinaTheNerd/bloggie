<!DOCTYPE html>
<html lang="en">

  <head>
    <title>SimpleCMS</title>
  </head>

  <body>
    <?php

      include_once('includes/bonesCMS.php');
      $obj = new simpleCMS();
      $obj->host = 'localhost';
      $obj->username = 'admin';
      $obj->password = 'TestingDatabase1';
      $obj->table = 'bloggie';
      $obj->connect();

      if ( $_POST )
        $obj->write($_POST);

      echo ( $_GET['admin'] == 1 ) ? $obj->display_admin() : $obj->display_public();

    ?>
  </body>

</html>
