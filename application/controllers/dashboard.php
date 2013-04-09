<?php

class Dashboard_Controller extends Base_Controller {

    public function action_index() {
        //all jobs listed
        // $jobs = job::all();
        //$slots = DB::table('distance_schedule')->get();
        $slots = schedule::all();

        return View::make('dashboard.index', array('slots' => $slots));
    }

    public function action_insert() {
        $input = Input::all();

        Validator::register('validTime', function($attribute, $value, $parameters){
            return preg_match('/([01]?[0-9]|2[0-3]):[0-5][0-9]/', $value);
        });

        //implement rules for validation here.......
        $rules = array(
            'date' => 'required', //description is required
            'number' => 'required', //dueDate is required
            'title' => 'required', //title is required
            'time' => 'validTime'
        );

        $messages = array(
            'validTime' =>'Sorry, that is not a valid time.',
        );

        $validation = Validator::make($input, $rules, $messages);

        if ($validation->fails()) {
            return Redirect::to('dashboard')->with_errors($validation);
        } else {
            $schedule = Schedule::create(array(
                        'title' => $input['title'],
                        //need to insert the date and time instead of just mm/dd/yyyy but 2012-11-28 15:45:20
/*
                        "INSERT INTO schedule 
                        (dateTimeSlot, numAllowed, title) 
                        VALUES(
                        '" . date("Y-m-d H:i:s", strtotime($_POST['date'] . " " . $_POST['time'] . " " . $_POST['amPm'])) . "',
                        '" . addslashes($_POST['numAllowed']) . "',
                        '" . addslashes($_POST['title']) . "'                               
*/
                        //just combine date + time + AM or PM
                        'dateTimeSlot' => $input['date'] + $input['time'],
                        'numAllowed' => $input['number'],
                        'time' => $input['time']
                    ));

            Session::flash('status_success', 'Successfully created a new job');
            return Redirect::to('dashboard');
        }
    }

    public function action_delete() {
        $input = Input::get('slot_id');

        //get the id for the class to be deleted
        $slot = schedule::where('id', '=', $input);
        //create query to delete table for the above id
        $slot->delete();

        //return the updated view 
        Session::flash('status_success', 'Time slot has been deleted');
        return Redirect::to('dashboard');
    }

}