<nav class="navbar navbar-default">
    <ul class="menu">

        <li><a href="/admin">Dashboard</a></li>
        <li><a href="{{route('users.index')}}">{{Auth::user()->role->name !='administrator' ? '' : 'Users'}}</a></li>
        <li><a href="{{route('users.index')}}">{{Auth::user()->role->name !='administrator' ? '' : 'Posts'}}</a></li>
        <li><a href="{{route('users.index')}}">{{Auth::user()->role->name !='administrator' ? '' : 'Categories'}}</a></li>
        <li><a href="{{route('users.show', Auth::user())}}">Profiles</a></li>
        

    </ul>
</nav>