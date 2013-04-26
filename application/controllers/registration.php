<?php

class Registration_Controller extends Base_Controller {
    

    public function action_index()
    {
        // $students = registration::all();

        $students = registration::order_by('regtime', 'desc')->get();

        return View::make('registration.index', array('students' => $students));
    }

    // public function action_insert()
    // {
    //     $input = Input::all();
    
    //     //implement rules for validation here.......
    //     $rules = array(
    //         'name' => 'required',
    //         'lnum' => 'required',
    //         'email' => 'required',
    //         'class' => 'required',            
    //     );
    
    //     $validation = Validator::make($input, $rules);
    
    //     if( $validation->fails() ) {
    //         return Redirect::to('registration')->with_errors($validation);
    //     }else{
    //       $registration = Registration::create(array(
    //                             'name' => $input['name'],
    //                             'lNum' => $input['lnum'],
    //                             'email' => $input['email'],
    //                             'class' => $input['class'],
                               
    //                             ));
    
    //     Session::flash('status_success', 'Successfully added new student');
    //     return Redirect::to('registration');
    //     }
    // }

    public function action_delete()
    {
        $input = Input::get('student_id');
        // $name = Input::get('student_name');
        //get the id for the class to be deleted
        $student = registration::where('id', '=', $input);
        //create query to delete table for the above id
        $student->delete();

        //return the updated view 
        Session::flash('status_success', 'Student sucessfully removed.');
        return Redirect::to('registration');
    }
}