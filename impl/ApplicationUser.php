<?php
namespace Impl;

class ApplicationUser extends \Spot\Entity {
    protected static $table = 'application_users';
    public static function fields()
    {
        return [
            'id'             => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'name'           => ['type' => 'string' ],
            'last_name'      => ['type' => 'string' ],
        ];
    }

    public static function relations(\Spot\MapperInterface $mapper, \Spot\EntityInterface $entity)
    {
     return [
         'devices' => $mapper->hasMany($entity, '\Impl\ApplicationUserDevices', 'application_user_id'),
     ];
   }
}
