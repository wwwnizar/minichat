<?php include("includes/header.php"); ?>


<div class="row">

  <!-- Blog Entries Column -->
  <div class="col-md-8">
    <h1>MyChat , new chat website ! </h1>
    <div class="">
      <h2>Envoyer un message</h2>
      <form action="mychat_post.php" method="post">
	<label for="pseudo">Pseudo: </label><input type="text" name="pseudo" id="pseudo"/><br/>
	<label for="message">Message: </label><input type="text" name="message" id="message"/>
	<input type="submit" value="envoyer">
      </form>

      <?php
      // php part (print the message from the database)
      try {
	  $myBase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8','');
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

    <div class="">
      <h2>MODIFIER un message ciblé par son ID:</h2>
      <form action="mychat_post.php" method="post">
	<label for="pseudo">Id du message: </label><input type="number" name="id_change" id="id_message"/><br/>
	<label for="message">Message: </label><input type="text" name="contenu" id="message"/>
	<input type="submit" value="envoyer">
      </form>
    </div>

    <div class="">
      <h2>SUPPRIMER un message ciblé par son ID:</h2>
      <form action="mychat_post.php" method="post">
	<label for="id_message">Id du message: </label><input type="number" name="id_delete" id="id_message"/><br/>
	<input type="submit" value="envoyer">
      </form>
    </div>

    <div class="">
      <h2>supprimer LE/LES message(s) selon le PSEUDO:</h2>
      <form action="mychat_post.php" method="post">
	<label for="pseudo">pseudo: </label><input type="text" name="author" id="pseudo"/><br/>
	<input type="submit" value="envoyer">
      </form>
    </div>

    <a href="mychat_post.php">
      <button class="" type="">
	TOUT SUPPRIMER
      </button>
    </a>


  </div>

  <!-- Blog Sidebar Widgets Column -->
  <div class="col-md-4">

    <?php include("includes/sidebar.php"); ?>

  </div>
  <!-- /.row -->

  <?php include("includes/footer.php"); ?>
