<?php

class Job_search_Controller extends Base_Controller {
    

    public function action_index()
    {
      
      // $results = job::all();
      // $search_results = job::all();

      $search_results = job::where('projname', 'LIKE', '%test%')->get();

      return View::make('job_search.index', array('search_results' => $search_results));

       // return View::make('tracker.index', array('jobs' => $jobs,
       // 											'due' => $due,
       // 											'assigned' => $assigned,
       // 											'progress' => $progress,
       // 											'proof' => $proof
       // 	));
    }

 	public function action_search()
    {
        // $status = Input::get('status');

        // $id = Input::get('id');

        // $user = User::find($id);

        //get input from keywords
        $keyword = Input::get('keywords');

        //run the query
        $search_results = job::where('projname', 'LIKE',  $keyword)->get();
        // $search_results = job::all();
       return View::make('job_search.index', array('search_results' => $search_results));
      //return Redirect::to('admin', $search_results);
    
    }
}