
@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-4">
            @include('inc.adminnav')
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/200x200'}}" alt="" height="200">
                            
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
    </div>
    
@endsection
