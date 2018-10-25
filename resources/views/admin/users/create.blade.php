
@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-4">
            @include('inc.adminnav')
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Create User Account</div>
                <div class="panel-body">
                    @include('inc.message')
                    {!! Form::open(['action'=>'AdminUsersController@store', 'method'=>'POST', 'files'=>true])!!}
                    <div class="form-group">
                        {!!Form::label('name', 'Fullname')!!}
                        {!!Form::text('name', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('email', 'Email address')!!}
                        {!!Form::text('email', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        
                            {!!Form::label('role', 'User role')!!}
                            {!!Form::select('role_id', $roles, 3, ['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            
                            {!!Form::label('status', 'Account status')!!}
                            {!!Form::select('is_active', [0=>'Inactive', 1=>'Active'], 0, ['class'=>'form-control'])!!}
                        </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                {!!Form::label('password', 'Password')!!}
                                {!!Form::password('password', ['class'=>'form-control'])!!}
                                {{--  <input type="password" name="password" class="form-control">  --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                {!!Form::label('password-confirm', 'Confirm password')!!}
                                {!!Form::password('password_confirmation', ['class'=>'form-control'])!!}
                                {{--  <input type="password" name="password_confirm" class="form-control">  --}}
                                </div>
                            </div>
                            
                        </div> 
                    </div>
                    <div class="form-group">
                            {!!Form::label('photo-id', 'Profile Image')!!}
                            {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
                        </div>
                    
                    {!!Form::submit('Submit', ['class'=>'btn btn-primary'])!!}
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
    
@endsection
