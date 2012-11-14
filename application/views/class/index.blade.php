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
        <h1>Distance - Edit Class</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
        <h3>Add Time Slot</h3>
        <form method="POST" action="{{ URL::to('class/insert') }}" id="add_class" enctype="multipart/form-data">
            <label>New Class</label>
            <input type="text" name="class" id="class"/>
        </form>
        <div>
            <button type="button" onclick="$(add_class).submit();" class="btn btn-primary">Add Class</button>
        </div>
    </div>
        <div class="alert alert-info">
        <h3 class="alert-heading">Class List</h3>
            <table class="table">
                <tr><th>Delete</th><th>Class Name</th></tr>
                @forelse ($classes as $classes)
                <form method="POST" action="class/delete" enctype="multipart/form-data">
                <tr>
                    <td>
                        <button class="btn btn-danger" type="submit">Delete</button>
                        <input name="class_id" type="hidden" value=" {{ $classes->id_distance_class }}"/>
                    </td>
                    <td>{{ $classes->class_section }}</td>
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