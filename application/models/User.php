<?php
class User extends Eloquent
{
    public static $timestamps = true;

    public function permission()
    {
        return $this->belongs_to('Permission');
    }

    public function getPermission($id){
		$permission_name = Permission::find($id);
	    return $permission_name->name;
	}

}