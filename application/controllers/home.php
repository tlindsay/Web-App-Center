<?php

class Home_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('home.index');
	}

    public function action_about()
    {
        return View::make('home.about', array(
            'sidenav' => array(
                array(
                    'url' => 'home',
                    'name' => 'Home',
                    'active' => false
                ),
                array(
                    'url' => 'about',
                    'name' => 'About',
                    'active' => true
                )
            )
        ));
    }
}