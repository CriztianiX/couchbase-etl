<?php
namespace Impl;

class ApplicationUserImpl {
  public function limit()
  {
    return 150;
  }

  public function where()
  {
    return [ "id >" => 0 ];
  }

  public function entity()
  {
    return "\Impl\ApplicationUser";
  }

  public function result($row)
  {
    return [
       "id" => $row->id,
       "name" => $row->name,
       "last_name" => $row->last_name,
       "email" => $row->email,
       "gender" => $row->gender ? $row->gender : null ,
       "from_facebook" => $row->from_facebook ? $row->from_facebook : false,
       "facebook_account" => $row->facebook_account,
       "birthday" => $row->birthday ? $row->birthday : null,
       "cards" => json_decode($row->cards, true),
       "categories" => json_decode($row->categories, true),
       "created_at" => $row->created_at,
       "modified_at" => $row->updated_at,
       "devices" => $this->devices($row)
    ];
  }

  private function devices($o)
  {
    $devices = [];
    foreach ($o->devices as $applicationUsersDevice) {
      $device = [
        "device" => $applicationUsersDevice->user_device,
        "token" => $applicationUsersDevice->device_identifier
      ];

      $devices[] = $device;
    }

    return $devices;
  }
}
