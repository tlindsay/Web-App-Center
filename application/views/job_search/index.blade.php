@layout('layouts/main')

@section('navigation')
<li><a href="tracker">Tracker</a></li>
<li><a href="user/logout">Logout</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span3">

    </div>
    <div class="span9">
        <h1>University Communications - Search</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
        <form action="job_search/search" method="POST">
            <table class="table">
                <tr>
                    <td>
                        <label for="keywords">Keywords</label>
                        <div class="input-append"> 
                            <input type="text" name="keywords" class="span2 search-query">
                            <button type="submit" class="btn btn-inverse">Search <i class="icon-search icon-white"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="assigned_to">Assigned to</label>
                        <select name="assigned_to">
                            <option value="">Thomas</option>
                            <option value="">Jeremy</option>
                            <option value="">Chuck</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="department">Department</label>
                        <select name="department" id="">
                            <option value="">a</option>
                            <option value="">b</option>
                            <option value="">c</option>
                            <option value="">d</option>
                        </select>
                    </td>
               </tr>
            </table>
        </form>
    </div>
    <div class="alert alert-info">
        <table class="table table-striped">
            <tr>    
                <th>Due Date</th>
                <th>Project Name</th>
                <th>Project Type</th>
                <th>Requested Date</th>
                <th>Assigned To</th>
            </tr>
             @forelse  ($search_results as $search_results)
            <tr>
                <td>{{ $search_results->datedue }}</td>
                <td>{{ $search_results->projname }}</td>
                <td>{{ $search_results->projtype }}</td>
                <td>{{ $search_results->reqdate }}</td>
                <td>{{ $search_results->projuserid }}</td>
            </tr>
            @empty

            @endforelse
        </table>
   </div>
</div>
@endsection