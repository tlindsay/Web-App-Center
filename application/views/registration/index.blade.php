@layout('layouts/main')

@section('navigation')
@parent
<li><a href="user/logout">Logout</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span3">

    </div>
    <div class="span9">
        <h1>Distance - Registration</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
       
    </div>
        <div class="alert alert-info">
        <h3 class="alert-heading">Class List</h3>
        <table class="table">
            <tr><th>Day</th><th>Time</th><th>Name</th><th>LNum</th><th>Email</th><th>Class</th><th>Delete</th></tr>
            @forelse ($students as $students)
            <tr><td></td><td>{{ $students->regTime }}</td><td>{{ $students->name}}</td><td>{{ $students->lNum }}</td><td>{{ $students->email }}</td><td>{{ $students->class }}</td></tr>
            @empty 
            <p>Nothing this week</p>
            @endforelse
        </table>
    </div>
    </div>
</div>
@endsection