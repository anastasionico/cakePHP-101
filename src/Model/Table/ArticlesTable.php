<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        // Timestamp behaviour automatically populate the created and modified columns of our table
        $this->addBehavior('Timestamp');
    }
}