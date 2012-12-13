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

        //implement rules for validation here.......
        $rules = array(
            'date' => 'required', //description is required
            'number' => 'required', //dueDate is required
            'title' => 'required' //title is required
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('dashboard')->with_errors($validation);
        } else {
            $schedule = Schedule::create(array(
                        'title' => $input['title'],
                        'dateTimeSlot' => $input['date'],
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