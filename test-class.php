<?php

function chargerClass($classe)
{
     require $classe.'.class.php';
}

spl_autoload_register('chargerClass');

echo "test de class Message".'<br/>';

$message1 = new Message(['id' => 1,
			 'author' => 'matthieu',
			 'content' => 'salut !!!',]);

echo 'message cree'.'<br/>';

echo $message1->id().'<br/>';
echo $message1->author().'<br/>';
echo $message1->content().'<br/>';
