@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Total admin account: <b>{{$admins->count()}}</b>
                    <br>
                    Total user account: <b>{{$users->count()}}</b>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Add Data</h3>
                            <br>
                        
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(\Session::has('success'))
                        {{-- session ung nilagay mo sa return ng controller --}}
                    
                        <div class="alert alert-success">
                        <p>{{ \Session::get('success')}}</p>
                        </div>
                        @endif
                        <form method="post" action="{{url('admin')}}">
                            {{-- url dito is ung folder view --}}
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First name" />
                            </div>
                            <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="Enter last name" />
                            </div>
                            <div class="form-group">
                                    <input type="submit" class="btn btn-primary" />
                            </div>
                        </form>
                        </div>
                    
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="container" id="dashboard_content">
    
</div>
@endsection
