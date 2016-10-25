<?php

function chargerClass($classe)
{
    require $classe.'.class.php';
}

spl_autoload_register('chargerClass');


//connexion to database
//try {
    $mybase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8', 'dehondtmatthieu', 'mD120989');
/*}
catch(Exception $error) {
    die('Error: '.$error->getMessage());
}*/

if ((isset($_POST['pseudo']) && isset($_POST['message'])) && (! empty($_POST['message']) && ! empty($_POST['pseudo'])))
{
// insert message to database
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    $mess = new Message(['author' => $_POST['pseudo'],
                         'content' => $_POST['message'],]);
    echo 'message cree'.'<br/>';
    echo $mess->author();
    echo $mess->content();

    $manager = new MessageManager($mybase);
    $manager->addMessage($mess);
    echo ' message enregistré';

//redirect to mychat.php
}
//header('Location: http://localhost/exercice-php/minichat-2/index.php');


