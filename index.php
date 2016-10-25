<?php include("includes/header.php"); ?>


<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">
    <h1>MyChat , new chat website ! </h1>
    <form action="mychat_post.php" method="post">
      <label for="pseudo">Pseudo: </label><input type="text" name="pseudo" id="pseudo"/><br/>
      <label for="message">Message: </label><input type="text" name="message" id="message"/>
      <input type="submit" value="envoyer">
    </form>

    <?php
    // php part (print the message from the database)
    try {
	$myBase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8','dehondtmatthieu', 'mD120989');
    }
    catch (Exception $error) {
	die('Erreur: '.$error->getMessage());
    }


    // get 10 last messages
    $allTable = $myBase->query('SELECT id, autheur, contenu FROM Messages ORDER BY id DESC LIMIT 0, 10');

    //print the messages
    while ($row = $allTable->fetch()) {
	echo '<p><bold>the id is '.$row['id'].'! -> '.htmlspecialchars($row['autheur']).'</bold>: '.htmlspecialchars($row['contenu']).'</p>';
    }
    $allTable->closeCursor();
    ?>

  </div>

  <!-- Blog Sidebar Widgets Column -->
  <div class="col-md-4">

    <?php include("includes/sidebar.php"); ?>

  </div>
  <!-- /.row -->

  <?php include("includes/footer.php"); ?>
