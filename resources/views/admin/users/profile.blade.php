
@extends('layouts.app')


@section('content')

    <div class="row">
        
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
        </div>
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Activities
                </div>
            </div>
        </div>
    </div>
    
@endsection
