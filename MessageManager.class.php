<?php

class MessageManager
{
    private $_myBase;

    
    //constructeur
    public function __construct($base)
    {
	$this->setDatabase($base);
    }

    
    //setters
    public function setDatabase(PDO $base)
    {
	$this->_myBase = $base;
    }

    
    // all method
    public function addMessage(Message $mess)
    {
	$insertion = $this->_myBase->prepare('INSERT INTO Messages(autheur, contenu) VALUES(:autheur, :contenu)');
	$insertion->bindValue(':autheur', $mess->author());
	$insertion->bindValue(':contenu', $mess->content());

	$insertion->execute();
	echo 'message add';
    }

    public function modifyMessage(Message $mess, $contenu)
    {
	
	$modification = $this->_myBase->prepare('UPDATE Messages SET contenu = :content WHERE id = :id');
	$modification->bindValue(':content', $contenu);
	$modification->bindValue(':id', $mess->id(), PDO::PARAM_INT);

	$modification->execute();
    }

    public function deleteMessage(Message $mess)
    {
	$delete = $this->_myBase->prepare('DELETE FROM Messages WHERE id = :id');
	$delete->bindValue(':id', $mess->id(), PDO::PARAM_INT);

	$delete->execute();
    }

    public function deleteMessageByPseudo($pseudo)
    {
	$delete = $this->_myBase->prepare('DELETE FROM Messages WHERE autheur = :autheur');
	$delete->bindValue(':autheur', $pseudo);
	$delete->execute();
    }

    public function deleteAll()
    {
	$this->_myBase->exec('DELETE FROM Messages');
    }
    
   
    
    
    
}

  
