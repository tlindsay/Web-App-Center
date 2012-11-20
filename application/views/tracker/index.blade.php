@layout('layouts/main')

@section('navigation')

<li><a href="user/logout">Logout</a></li>
<li><a href="job_search">Search</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span3">

    </div>
    <div class="span9">
        <h1>University Communications - Tracker</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
        <ul class="nav nav-pills" id="sort-tab">
            <li class="active"><a href="#home">This Week</a></li>
            <li><a href="#profile">Assigned</a></li>
            <li><a href="#messages">In Progress</a></li>
            <li><a href="#settings">Proof Out</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <table class="table">
                    @foreach ($due as $due)
                    <tr>
                        <td>{{ $due->datecomplete }}</td>
                        <td>{{ $due->projname }}</td>
                        <td>{{ $due->projtype }}</td>
                        <td>{{ $due->reqdate }}</td>
                        <td>{{ $due->projuserid }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane" id="profile">
                <table class="table">
                    @foreach ($assigned as $assigned)
                    <tr>
                        <td>{{ $assigned->datecomplete }}</td>
                        <td>{{ $assigned->projname }}</td>
                        <td>{{ $assigned->projtype }}</td>
                        <td>{{ $assigned->reqdate }}</td>
                        <td>{{ $assigned->projuserid }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane" id="messages">
                <table class="table">
                    @foreach ($progress as $progress)
                    <tr>
                        <td>{{ $progress->datecomplete }}</td>
                        <td>{{ $progress->projname }}</td>
                        <td>{{ $progress->projtype }}</td>
                        <td>{{ $progress->reqdate }}</td>
                        <td>{{ $progress->projuserid }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane" id="settings">
                <table class="table">
                    @foreach ($proof as $proof)
                    <tr>
                        <td>{{ $proof->datecomplete }}</td>
                        <td>{{ $proof->projname }}</td>
                        <td>{{ $proof->projtype }}</td>
                        <td>{{ $proof->reqdate }}</td>
                        <td>{{ $proof->projuserid }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="alert alert-info">
        <h3 class="alert-heading">Job List</h3>
        <table class="table">
            <tr>
                <th>----</th>
                <th>Due Date</th>
                <th>Job Name</th>
                <th>Project Type</th>
                <th>Project Status</th>
                <th>Date Request</th>
                <th>Assigned to</th>
            </tr>
        @foreach ($jobs as $jobs)
            <tr>
                <td><i class="icon-pencil" onclick="$('#edit_job').modal({backdrop: 'static'});"></i></td>
                <td>{{ $jobs->datedue }}</td>
                <td>{{ $jobs->projname }}</td>
                <td>{{ $jobs->projtype }}</td>
                <td>{{ $jobs->projstatus }}</td>   
                <td>{{ $jobs->reqdate }}</td>
                <td>{{ $jobs->projuserid }}</td>
            </tr> 
        @endforeach
        </table>
    </div>
    </div>
</div>
@endsection