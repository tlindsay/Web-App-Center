<?php

class Permission extends Eloquent
{
	public static $timestamps = true;

	public function user()
     {
          return $this->has_one('User');
     }

}
