<?php

class Class_Controller extends Base_Controller {
    

	public function action_index()
	{
              $classes = distance::all();

		return View::make('class.index', array('classes' => $classes));
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
            return Redirect::to('class')->with_errors($validation);
        }else{
          $distance = Distance::create(array(
                                'class_section' => $input['class']
                                ));

        Session::flash('status_success', 'Successfully added new class');
        return Redirect::to('class');
        }
    }

    public function action_delete()
    {
        $input = Input::get('class_id');

        //get the id for the class to be deleted
        $class = distance::where('id_distance_class', '=', $input);
        //create query to delete table for the above id
        $class->delete();

        //return the updated view 
        Session::flash('status_success', 'Class has been deleted');
        return Redirect::to('class');
    }
}