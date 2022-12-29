@extends('components.layout.layout')
@section('content')
@include('ferwafa.layout._aside')
@include('ferwafa.layout.header')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <div class="row">
            @if (isset($team_id))
            <!-- Column -->
            <div class="col-lg-6 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title mb-5">Team Details </h5>
                    <center class="mt-4">
                        <img src="{{ asset('storage/'.$team_id->logo.'') }}" class="img-circle" width="150" />
                        <h4 class="card-title mt-2">{{ $team_id->name }}</h4>
                        <h6 class="card-subtitle">{{ $team_id->stadium }}</h6>
                        <div class="row text-center justify-content-md-center">

                        </div>
                        <form action="../team/{{ $team_id->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </center>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
            <div class="card card-body mailbox">
                <h5 class="card-title mb-5">Edit {{ $team_id->name }} Team</h5>
                @include('components.layout._flash-message')

                <form class="form-horizontal form-material mx-2" method="post" action="../team/{{ $team_id->id }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" placeholder="Team name" class="form-control form-control-line"
                                name="team_name" value="{{ $team_id->name }}">
                            @error('team_name')<span x-data="{show: true}"
                                x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" placeholder="stadium" name="stadium" value="{{ $team_id->stadium }}"
                                class="form-control form-control-line">
                            @error('stadium')<span x-data="{show: true}"
                                x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" placeholder="Johnathan Doe" name="logo" value=""
                                class="form-control form-control-line">
                            @error('logo')<span x-data="{show: true}" x-init="setTimeout(()=> show = false , 5000)"
                                x-show="show" class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Username" name="username"
                                    value="{{ $team_id->username }}" class="form-control form-control-line">
                                @error('username')<span x-data="{show: true}"
                                    x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                    {{ $message }}
                                </span>@enderror
                            </div>
                            <div class="col-md-6">
                                <input type="password" placeholder="password" name="password"
                                   class="form-control form-control-line">
                                @error('password')<span x-data="{show: true}"
                                    x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                    {{ $message }}
                                </span>@enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Edit Team</button>
                       
                        </div>
                    </div>
                </form>
                

            </div>
            </div>
            @else
            <div class="col-lg-6 col-md-12">
            @include('ferwafa.layout.all_team')
            </div>
            <div class="col-lg-6 col-md-12">

                <div class="card card-body mailbox">
                    <h5 class="card-title mb-5">Add New </h5>

                    @include('components.layout._flash-message')

                    <form class="form-horizontal form-material mx-2" method="post" action="{{ route('team_store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" placeholder="Team name" class="form-control form-control-line"
                                    name="team_name" value="{{ old('team_name') }}">
                                @error('team_name')<span x-data="{show: true}"
                                    x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                    {{ $message }}
                                </span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" placeholder="stadium" name="stadium" value="{{ old('stadium') }}"
                                    class="form-control form-control-line">
                                @error('stadium')<span x-data="{show: true}"
                                    x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                    {{ $message }}
                                </span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" placeholder="Johnathan Doe" name="logo" value="{{ old('logo') }}"
                                    class="form-control form-control-line">
                                @error('logo')<span x-data="{show: true}" x-init="setTimeout(()=> show = false , 5000)"
                                    x-show="show" class="text-danger">
                                    {{ $message }}
                                </span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Username" name="username"
                                        value="{{ old('username') }}" class="form-control form-control-line">
                                    @error('username')<span x-data="{show: true}"
                                        x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                        {{ $message }}
                                    </span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password" placeholder="password" name="password"
                                        value="{{ old('password') }}" class="form-control form-control-line">
                                    @error('password')<span x-data="{show: true}"
                                        x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                        {{ $message }}
                                    </span>@enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Add Team</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            @endif
  
        </div>

        <!-- ============================================================== -->
    </div>
</div>


@include('components.layout._flash-message')

@endsection
