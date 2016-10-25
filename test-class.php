<?php

function chargerClass($classe)
{
     require $classe.'.class.php';
}

spl_autoload_register('chargerClass');
$mybase = new PDO('mysql:host=localhost;dbname=exercice;charset=utf8', 'dehondtmatthieu', 'mD120989');

echo "test de class Message".'<br/>';

$message1 = new Message(['author' => 'maxime',
			 'content' => 'salut !!!',]);
$message2 = new Message([
    'id' => 1,
    'author' => 'MATTHIEU',
    'content' => 'SALUT',]);

echo 'message cree'.'<br/>';

echo $message1->id().'<br/>';
echo $message1->author().'<br/>';
echo $message1->content().'<br/>';

$pseudo = $message1->author();
echo $pseudo.'<br/>';

$manager = new MessageManager($mybase);
echo 'manager ok'.'<br/>';

$manager->addMessage($message1);
echo 'add message ok'.'<br/>';


/*
$newContent = 'non au-revoir';
$manager->modifyMessage($message1, $newContent);
echo 'modify message ok'.'<br/>';

$manager->deleteMessage($message2);
echo 'delete ok'.'<br/>';

$manager->deleteMessageByPseudo($pseudo);
echo 'delete by pseudo ok'.'<br/>';

$manager->deleteAll();
echo 'goog';

*/


