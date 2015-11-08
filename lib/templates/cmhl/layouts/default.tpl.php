
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>CMHL Hockey</title>

  <link href="css/menu.css" rel="stylesheet" />

</head>
<body>

  <div id="bannertop" >
    <a href="index.php">
      <div style="float:left; width:20%"><img src="images/yandle.png" alt="CMHL Award Winners" border="0" /></div>
      <div style="float:left; width:59%"><img style="display: block; margin: 0 auto" src="images/cmhl.png" /></div>
      <div style="float:right; text-align:right; width:20%"><img src="images/coyotes.png" alt="Champ Logo" border="0" /></div>
    </a>
  </div>
  <nav>
    <?php
      // TODO Mobile-friendly menu option
      $app = \SparkLib\Application::app();
      $dropdown = $app->partial('menubar');
      echo $dropdown->render();
    ?>
  </nav>
  <nav style="float:left; width:250px">
    <?php
      $left = $app->partial('leftmenu');
      echo $left->render();
    ?>
  </nav>
  <section style="padding:20px; width:70%; float:left">

    <?php
      // Contents
    ?>

  </section>


</body>
</html>

