
@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-4">
            @include('inc.adminnav')
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit profile info</div>
                <div class="panel-body">
                    {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PATCH'])!!}
                    <div class="form-group">
                        {!!Form::label('name', 'Fullname')!!}
                        {!!Form::text('name', $user->name, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('email', 'Email address')!!}
                        {!!Form::text('email', $user->email, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        
                        {!!Form::label('role', 'User role')!!}
                        {!!Form::select('role_id', $roles, $user->role_id, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        
                        {!!Form::label('status', 'Account status')!!}
                        {!!Form::select('is_active', [0=>'Inactive', 1=>'Active'], null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                {!!Form::label('password', 'Password')!!}
                                {!!Form::password('password', ['class'=>'form-control'])!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                {!!Form::label('password-confirm', 'Confirm password')!!}
                                {!!Form::password('password_confirmation', ['class'=>'form-control'])!!}
                                </div>
                            </div>
                            
                        </div> 
                    </div>
                    <div class="form-group">
                        {!!Form::label('profile-image', 'Profile Image')!!}
                        {!!Form::file('profile', null, ['class'=>'form-control'])!!}
                    </div>
                    {!!Form::submit('Update info', ['class'=>'btn btn-primary'])!!}
                    <a href="{{route('users.show', $user->id)}}" class="btn btn-info">Cancel</a>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    
@endsection
