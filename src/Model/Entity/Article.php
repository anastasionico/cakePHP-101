<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
	// the _accessible property controls how properties can be modified by Mass Assignment.
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}