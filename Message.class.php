<?php

class Message
{
    private $_id;
    private $_author;
    private $_content;

    //constructor for Message object
    public function __construct($donnees)
    {
	$this->hydrate($donnees);
    }
    
    public function hydrate(array $donnees)
    {
	foreach ($donnees as $key => $value)
	{
	    $method = 'set'.ucfirst($key);
	    if (method_exists($this, $method))
	    {
		$this->$method($value);
	    }
	}
    }
    
    
    // getters

    public function id()
    {
	return $this->_id;
    }

    public function author()
    {
	return $this->_author;
    }

    public function content()
    {
	return $this->_content;
    }

    //setters
    public function setId($id)
    {
	$id = (int) $id;
	if ($id > 0)
	{
	    $this->_id = $id;
	}
    }

    public function setAuthor($author)
    {
	if (is_string($author))
	{
	    $this->_author = $author;
	}
    }

    public function setContent($content)
    {
	if (is_string($content))
	{
	    $this->_content = $content;
	}
    }
 
}

  
