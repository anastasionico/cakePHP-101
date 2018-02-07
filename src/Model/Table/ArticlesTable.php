<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        // Timestamp behaviour automatically populate the created and modified columns of our table
        $this->addBehavior('Timestamp');
    }

    public function beforeSave($event, $entity, $options)
	{
	    if ($entity->isNew() && !$entity->slug) {
	        $sluggedTitle = Text::slug($entity->title);
	        // trim slug to maximum length defined in schema
	        $entity->slug = substr($sluggedTitle, 0, 191);
	    }
	}

	public function validationDefault(Validator $validator)
	{
	    // The validationDefault() method tells CakePHP how to validate your data when the save() method is called. 
	    $validator->notEmpty('title')
	        ->minLength('title', 10)
	        ->maxLength('title', 255)

	        ->notEmpty('body')
	        ->minLength('body', 10);

	    return $validator;
	}
}