
@extends('layouts.app')


@section('content')

    <div class="row">
        {{-- display layout for administrator --}}
        @if (Auth::user()->role->name === 'administrator')
            
        <div class="col-md-4">
            @include('inc.adminnav')
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{$user->photo ? $user->photo->file : '/images/nophoto.png'}}" alt="" height="200">
                            
                        </div>
                        <div class="panel-footer text-center">{{$user->name}}<br />
                        <span class="label label-{{$user->is_active != 1 ? 'danger' : 'success'}} text-center">{{$user->is_active != 1 ? 'Inactive' : 'Active'}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Account Details</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Fullname</strong>: {{$user->name}}</li>
                                    <li class="list-group-item"><strong>Email</strong>: {{$user->email}}</li>
                                    <li class="list-group-item"><strong>Role</strong>: {{$user->role->name}}</li>
                                    <li class="list-group-item"><strong>Signed on</strong>: {{date('d-m-Y', strtotime($user->created_at))}}</li>
                                    <li class="list-group-item"><strong>Updated</strong>: {{$user->updated_at->diffForHumans()}}</li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                        <a href="{{route('users.index')}}" class="btn btn-info">Back</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit user info</a>

                        <a href="{{route('users.update', $user->id)}}" class="btn btn-danger">{{$user->is_active != 1 ? 'Activate account' : 'Deactivate account' }}</a>
                            
                        
                </div>
            </div>
        </div>
        {{-- display subscriber layout --}}
        @else
        <div class="col-md-3">
            <div class="panel panel-info text-center">
                <div class="panel-heading"><strong>Profile picture</strong></div>
                
                <div class="panel-body">
                        
                    <img src="{{Auth::user()->photo ? Auth::user()->photo->file : '/images/nophoto.png'}}" alt="" height="200">
                </div>
                <div class="panel-footer">
                    
                    <p class="label label-{{Auth::user()->is_active == 1 ? 'success' : 'danger'}}">{{Auth::user()->is_active == 1 ? 'Active' : 'Inactive'}}</p>
                    <p class="label label-info">{{Auth::user()->role->name}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Account details</strong></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Fullname: </strong>{{Auth::user()->name}}</li>
                        <li class="list-group-item"><strong>Email: </strong>{{Auth::user()->email}}</li>
                        <li class="list-group-item"><strong>Signed on: </strong>{{date('d-m-Y', strtotime(Auth::user()->created_at))}}</li>
                        <li class="list-group-item"><strong>Updated on: </strong>{{Auth::user()->updated_at->diffForHumans()}}</li>
                    </ul>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('users.index')}}" class="btn btn-info">Back</a>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-info">Edit user info</a>
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route'=>['users.update', Auth::user()->id], 'method'=>'PATCH'])!!}
                        {!!Form::hidden('is_active', Auth::user()->is_active == 1 ? 0 : 1)!!}
                        {!!Form::submit(Auth::user()->is_active == 1 ? 'Deactivate account' : 'Activate account', ['class'=>'btn btn-danger'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
                
                
                {{-- <a href="{{route('users.update', $user->id)}}" class="btn btn-danger">{{$user->is_active != 1 ? 'Activate account' : 'Deactivate account' }}</a> --}}
            
        </div>
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Activities
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Online users:
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
    </div>
    
@endsection
