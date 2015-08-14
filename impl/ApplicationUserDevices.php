<?php
namespace Impl;
class ApplicationUserDevices extends \Spot\Entity {
    protected static $table = 'application_users_devices';
    public static function fields()
    {
        return [
            'id'                => ['type' => 'integer', 'primary' => true, 'autoincrement' => true],
            'user_device'       => ['type' => 'string' ],
            'device_identifier'       => ['type' => 'string' ],
        ];
    }
}
