@layout('layouts/main')
@section('navigation')
<li><a href="user/logout">Logout</a></li>
@endsection

@section('content')
<div class="row">
    <div class="span3">

    </div>
    <div class="span9">
        <h1>Admin Panel - Web Applications Manager</h1>
    </div>
    <br style="clear:both"/>
    <div class="well" style="text-align: left">
        <h3>Site Quick Links</h3>
        <p>Distance Learning Application</p>
        <ul>
            <li><a href="registration">Registration</a></li>
            <li><a href="class">Class</a></li>
            <li><a href="dashboard">Dashboard</a></li>
        </ul>
        <p>Job Tracker</p>
        <ul>
            <li><a href="tracker">Tracker</a></li>
            <li><a href="job_search">Job Search</a></li>
            <li><a href="#">Cool Link</a></li>
        </ul>
    </div>
    <div class="alert alert-info">
        <h3>New User</h3>
        <form class="" method="POST" action="admin/add">
            <label for="email">Email</label>
            <input type="email" placeholder="Email Address" name="email" id="email" />
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" id="password" />
            <label for="active">Active</label>
            <select name="active" id="active">Active
                <option value="Y">YES</option>
                <option value="N">NO</option>
            </select>
            <label for="site">Permission Level</label>
            <select name="site" id="site">
            @foreach ($permissions as $permissions)
                <option value="{{ $permissions->id }}">{{ $permissions->name }}</option>
            @endforeach
            </select>
            <br />
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
        <h3 class="alert-heading">Web App Users</h3>
        <table class="table">
            <tr><th>Email</th><th>Active</th><th>Permission</th><th>Activation Tool</th></tr>
            @forelse ($users as $users)
            <form action="admin/activate" method="POST">
            <tr>
                <td>{{ $users->email }}</td>
                <td>{{ $users->active }}</td>
                <td>{{ $users->permission_id }} <input type="hidden" name="id" value="{{ $users->permission_id }}"/></td>
                <td>
                    @if ( $users->active == 'Y')
                    <button type="submit" class="btn btn-warning">Activate</button>
                    @else
                    <button type="submit" class="btn btn-success">De-Activate</button>
                    @endif
                </td>
            </tr>
            </form>
            @empty 
            <p>Nothing this week</p>
            @endforelse
        </table>
    </div>
</div>
@endsection