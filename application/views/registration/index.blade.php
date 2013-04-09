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
        <h1>Distance - Registration</h1>
    </div>
    <br style="clear:both"/>
   <!--  <div class="well" style="text-align: left">
        <h3>Add Students</h3>
        <form method="POST" action="registration/insert" id="add_student" enctype="multipart/form-data">
            <label>Session</label>
            <input type="text" name="session" id="session"> 
            <label>Student Name</label>
            <input type="text" name="name" id="name"/>
            <label>L Number</label>
            <input type="text" name="lnum" id="lnum"/>
            <label>Email Address</label>
            <input type="text" name="email" id="email"/>
            <label>Class</label>
            <input type="text" name="class" id="class"/>
        </form> 
        <div>
            <button type="button" onclick="$(add_student).submit();" class="btn btn-primary">Add Student</button>
        </div>
    </div> -->
        <div class="alert alert-info">
        <h3 class="alert-heading">Registered Students</h3>
        <table class="table">
            <tr><th>Session ID</th><th>Name</th><th>L Number</th><th>Email</th><th>Class</th><th>Delete</th></tr>
            @forelse ($students as $students)
            <form method="POST" action="registration/delete" enctype="multipart/form-data">
                <tr>
                    <td>{{ $students->scheduleId }}</td>
                    <td>{{ $students->name }}</td>
                    <td>{{ $students->lnum }}</td>
                    <td>{{ $students->email }}</td>
                    <td>{{ $students->class }}</td>
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <!-- <input name="student_name" type="hidden" value="{{ $students->name}}"/> -->
                        <input name="student_id" type="hidden" value=" {{ $students->id }}"/>
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
@endsection