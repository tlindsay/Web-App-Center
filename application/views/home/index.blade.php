@layout('layouts/main')

@section('navigation')
<li><a href="about">About</a></li>
@endsection

@section('content')
<div class="hero-unit">
    <div class="row">
        <div class="span6">
            <h1>Welcome to UNA Web App Center!</h1>
            <p>The UNA Web App Center is an in-house application used to manage Web Applications for Univeristy of North Alabama.</p>
            <p><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
            
            <form class="well" method="POST" action="user/authenticate">
                <label for="email">Email</label>
                <input type="email" placeholder="Your Email Address" name="email" id="email" />
                <label for="password">Password</label>
                <input type="password" placeholder="Your Password" name="password" id="password" />
                <br />
                <button type="submit" class="btn btn-success">Login</button><span class="help-inline">For a new account, contact your administrator.</span>
            </form>
        </div>
        
        <div class="span4">
            <img src="../img/logo-trans.png" alt="Instapics!" />
        </div>
    </div>
    
</div>

<!-- Example row of columns -->
<div class="row">
    <div class="span3">
    </div>
    <div class="span4">
        <a href="#"></a>
    </div>
    <div class="span4">
        <a href="#"></a>
    </div>
</div>
@endsection