<?php

class Relationship extends Eloquent
{
	public static $timestamps = true;

	public function follower()
	{
		return $this->belongs_to('User', 'follower_id');
	}
    
    public function followed()
    {
        return $this->belongs_to('User', 'followed_id');
    }

    // public function Job()
    // {
    // 	return $this->belongs_to('User', 'jobs_id');
    // }
}
