<?php
class Admin_Controller extends Base_Controller
{
    public function action_index()
    {

        $users = user::all();
        $permissions = permission::all();

     // dd($permissions);
     return View::make('admin.index', array('permissions' => $permissions, 'users' => $users));
    
    }

    //add new users here 
    public function action_add()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $active = Input::get('active');

        $input = array(
            'email' => $email,
            'password' => $password,
            'acitve' => $active
        );

        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required',
        );
        
        $validation = Validator::make($input, $rules);
        
        if( $validation->fails() ) {
            return Redirect::to('admin')->with_errors($validation);
        }
        
        try {
            $user = new User();
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->active = $active;
            $user->save();

            Session::flash('status_success', 'New user has been added');
            return Redirect::to('admin');

        }  catch( Exception $e ) {
            Session::flash('status_error', 'An error occurred while creating a new account - please try again.');
            return Redirect::to('admin');
        }
    }
    
    public function action_activate()
    {
        //get the value of that user
        $status = Input::get('status');
        $id = Input::get('id');
        // dd($status);
        $user = User::find($id);

        //if the value is Y then change to N
        if ($status == 'Y'){
            $user->active = 'N';
        }else{
            $user->active = 'Y';
        }

        $user->save();

        //flash confirmation
        Session::flash('status-success', 'Status has been changed');
        return Redirect::to('admin');
    }
}