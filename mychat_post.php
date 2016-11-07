<?php

function chargerClass($classe)
{
    require $classe.'.class.php';
}

spl_autoload_register('chargerClass');


//connexion to database
//try {
$mybase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8', 'dehondtmatthieu', 'mD120989' );
/*}
   catch(Exception $error) {
   die('Error: '.$error->getMessage());
   }*/

$manager = new MessageManager($mybase);

if ((isset($_POST['pseudo']) && isset($_POST['message'])) && (! empty($_POST['message']) && ! empty($_POST['pseudo'])))
{
    // insert message to database
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $mess = new Message(['author' => $pseudo,
                         'content' => $message,]);

    $manager->addMessage($mess);
}
elseif ((isset($_POST['id_change']) && isset($_POST['contenu'])) && (!empty($_POST['id_change']) && !empty($_POST['contenu'])))
{
    $id = htmlspecialchars($_POST['id_change']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $manager->modifyMessage($id, $contenu);
}
elseif (isset($_POST['id_delete']) && !empty($_POST['id_delete']))
{
    $id = htmlspecialchars($_POST['id_delete']);
    $manager->deleteMessage($id);
}
elseif (isset($_POST['author']) && !empty($_POST['author']))
{
    $author = htmlspecialchars($_POST['author']);
    $manager->deleteMessageByPseudo($author);
}
else
{
    $manager->deleteAll();
}

//redirect to mychat.php
header('Location: http://localhost/exercice-php/minichat-2/index.php');
