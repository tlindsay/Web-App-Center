<?php
class Admin_Controller extends Base_Controller
{
    public function action_index()
    {

        $users = user::all();
        $permissions = permission::all();
        // foreach ($users as $users){
        //     select 'name' from 'permissions' where 'id' = $users;
        // }

     // dd($permissions);
     return View::make('admin.index', array('permissions' => $permissions, 'users' => $users));
    
    }

    //add new users here 
    public function action_add()
    {
        $permissionid = Input::get('site');
        $email = Input::get('email');
        $password = Input::get('password');
        $active = Input::get('active');

        $input = array(
            'email' => $email,
            'password' => $password,
            'active' => $active
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
            $user->permission_id = $permissionid;
            $user->active = $active;
            $user->save();

            Session::flash('status_success', 'New user has been added');
            return Redirect::to('admin');

        }  catch( Exception $e ) {
            Session::flash('status_error', 'An error occurred while creating a new account - please try again.');
            return Redirect::to('admin');
        }
    }

    // public function getPermission($id){
    //     echo $id;
    //     $permName = DB::query("select 'name' from 'permissions' where 'id' = $id");
    //     return $permName;
    // }
    
    public function action_activate()
    {
        //get the value of that user
        $id = Input::get('id');
        $user = User::find($id);
        // dd($status);
        $status = $user->active;

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