<?php

class Registration_Controller extends Base_Controller {
    

	public function action_index()
	{
              $students = student::all();

		return View::make('registration.index', array('students' => $students));
	}

	 public function action_insert()
    {
        $input = Input::all();
        
        //implement rules for validation here.......
        $rules = array(
            'class' => 'required', //description is required
        );

        $validation = Validator::make($input, $rules);

        if( $validation->fails() ) {
            return Redirect::to('registration')->with_errors($validation);
        }else{
          $distance = Distance::create(array(
                                'class_section' => $input['class']
                                ));

        Session::flash('status_success', 'Successfully added new class');
        return Redirect::to('registration');
        }
    }
}