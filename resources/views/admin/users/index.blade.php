
@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-4">
            @include('inc.adminnav')
        </div>
        <div class="col-md-8">
                <a href="{{route('users.create')}}" class="btn btn-default">Add new user</a>
                <h2>Users</h2>

            
            <ul class="list-group">
                @if(count($users) > 0)
                @if (Auth::user()->role_id != '1')

                <li class="list-group-item">
                        <a class="btn btn-default" href="{{route('users.show', Auth::user()->id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-default"><i class="fa fa-trash"></i></a>
                        
                        <span class="badge">14</span>
                        <span>{{Auth::user()->name}}</span> | <span class="label label-primary">{{Auth::user()->role->name}}</span>
                        
                    </li>
                @else
               
                @foreach ($users as $user)
                    
                <li class="list-group-item">
                    <a class="btn btn-default" href="{{route('users.show', $user->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-default"><i class="fa fa-trash"></i></a>
                    
                    <span class="badge">14</span>
                    <span>{{$user->name}}</span> | <span class="label label-primary">{{$user->role->name}}</span> <span class="label label-{{$user->is_active != 1 ? 'danger' : 'success'}}">{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</span>
                    
                </li>
                @endforeach
                @endif
                @endif
            </ul>
        </div>
    </div>
    
@endsection
