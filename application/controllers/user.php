<?php
class User_Controller extends Base_Controller
{    
    public function action_authenticate()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $new_user = Input::get('new_user', 'off');
        $name = Input::get('name');

        $input = array(
            'email' => $email,
            'password' => $password
        );

        //register new users here
        if( $new_user == 'on' ) {
            
            $rules = array(
                'email' => 'required|email|unique:users',
                'password' => 'required',
                //'name' => 'required'
            );
            
            $validation = Validator::make($input, $rules);
            
            if( $validation->fails() ) {
                return Redirect::to('home')->with_errors($validation);
            }
            
            try {
                $user = new User();
                $user->email = $email;
                $user->password = Hash::make($password);
                $user->save();
                Auth::login($user);
            
                return Redirect::to('dashboard');
            }  catch( Exception $e ) {
                Session::flash('status_error', 'An error occurred while creating a new account - please try again.');
                return Redirect::to('home');
            }
        } else { //returning users follow this path
        
            $rules = array(
                'email' => 'required|email|exists:users',
                'password' => 'required'
            );
            
            $validation = Validator::make($input, $rules);
            
            if( $validation->fails() ) {
                return Redirect::to('home')->with_errors($validation);
            }
            
            $credentials = array(
                'username' => $email,
                'password' => $password
            );
            //user passes validaiton check
            if( Auth::attempt($credentials)) {
                return Redirect::to($this->get_destination($email));
            } else { //user fails validation
                Session::flash('status_error', 'Your email or password is invalid - please try again.');
                return Redirect::to('home');
            }
        }
    }
    
    //find the destination the user should go to
    public function get_destination($email)
    {

   // $page = User->permission;
    $page = 'admin';
        
        return $page;
    }


    public function action_logout()
    {
        Auth::logout();
        Redirect::to('/');
    }
}