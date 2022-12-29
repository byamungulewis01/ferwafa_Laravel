@extends('components.layout.layout')
@section('content')
@include('ferwafa.layout._aside')
@include('ferwafa.layout.header')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <div class="container-fluid">

        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title">All referee</h5>
                    <div class="message-center" style="height: 420px !important;">
                        <div class="table-responsive mt-3 no-wrap">
                            <table class="table vm no-th-brd pro-of-month">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Names</th>
                                        <th>Email Address</th>
                                        <th colspan="2">Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td><span class="round"><img src="../Profile/" alt="user"
                                                    width="50" height="50"></span></td>
                                        <td>
                                            <h6>soro</h6>
                                            <small class="text-muted">Ruzindana</small>
                                        </td>
                                        <td>Email</td>
                                        <td> <a href="?edit="><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td> <a href="?delete="><i
                                                    class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
            <div class="card card-body mailbox">
                <h5 class="card-title mb-5">Add Referee</h5>
                <form class="form-horizontal form-material mx-2" method="post" action="{{ route('store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="fname" placeholder="First name"
                                class="form-control form-control-line" value="{{ old('fname') }}">
                                @error('fname')<span x-data="{show: true}"
                                x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="lname" placeholder="Last Name"
                                class="form-control form-control-line" value="{{ old('lname') }}">
                                @error('lname')<span x-data="{show: true}"
                                x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" name="profile" class="form-control form-control-line">
                            @error('profile')<span x-data="{show: true}"
                            x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                            {{ $message }}
                        </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" placeholder="Email Address"
                                class="form-control form-control-line" value="{{ old('email') }}">
                                @error('email')<span x-data="{show: true}"
                                x-init="setTimeout(()=> show = false , 5000)" x-show="show" class="text-danger">
                                {{ $message }}
                            </span>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Add Referee</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>


    @endsection
