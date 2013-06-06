@layout('layouts/main')

@section('navigation')
@parent
<li><a href="user/logout">Logout</a></li>
@endsection

@section('content')
<div class="active">
<div class="row">
    <div class="span3">

    </div>
    <div class="span9">
        <h1>Distance - Test Schedule Manager</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
        <h3>Add Time Slot</h3>
        <form method="POST" action="dashboard/insert" id="insert_section" enctype="multipart/form-data">
            <label>Date</label>
            <input type="text" name="date" id="date" class="datepicker"/>
            <label>Time</label>
            <input type="text" name="time" id="time"/>
                <span class="help-inline">
                    hh:mm Format
                </span>
            <label>Total Registrations Allowed</label>
            <input type="text" name="number" id="number"/><span class="help-inline">Must be greater than 0</span>
            <label>Short Title</label>
            <input type="text" name="title" id="title"/><span class="help-inline">(e.g. "Session 1")</span>
            <br/>
            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
    <div class="alert alert-info">
        <h3 class="alert-heading">Scheduled Time Slots</h3>
        <table class="table">
            <tr><th>Title</th><th>Date</th><th>Time</th><th>Number</th><th>Delete</th></tr>
            @forelse ($slots as $slots)
            <form method="POST" action="dashboard/delete" enctype="multipart/form-data">
                <?php 
                    $date = date("n/d/Y", strtotime($slots->datetimeslot));
                    $time = date("g:i A", strtotime($slots->time));
                ?>
                <tr>
                    <td>{{ $slots->title }}</td>
                    <td>{{ $date }}</td>
                    <td>{{ $time}}</td>
                    <td>{{ $slots->numallowed }}</td>
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <input name="slot_id" type="hidden" value=" {{ $slots->id }}"/>
                    </td>
                </tr>
            </form>
            @empty 
            <p>Nothing this week</p>
            @endforelse
        </table>
    </div>
</div>
</div>
<!-- <script type="text/javascript" src="js/bootstrap-datepicker.js">$(document).ready(function() {$('.datepicker').datepicker();});</script> -->
@endsection