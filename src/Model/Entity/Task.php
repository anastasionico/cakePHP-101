<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property bool $done
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modifield
 *
 * @property \App\Model\Entity\User $user
 */
class Task extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'title' => true,
        'body' => true,
        'done' => true,
        'created' => true,
        'modifield' => true,
        'user' => true
    ];
}
