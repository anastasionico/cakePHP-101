<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

// Features belonging to a single record are put on the Entity class.
class Article extends Entity
{
	// the _accessible property controls how properties can be modified by Mass Assignment.
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];

    protected function _getTagString()
	{
	    if (isset($this->_properties['tag_string'])) {
	        return $this->_properties['tag_string'];
	    }
	    if (empty($this->tags)) {
	        return '';
	    }
	    $tags = new Collection($this->tags);
	    $str = $tags->reduce(function ($string, $tag) {
	        return $string . $tag->title . ', ';
	    }, '');
	    return trim($str, ', ');
	}
}