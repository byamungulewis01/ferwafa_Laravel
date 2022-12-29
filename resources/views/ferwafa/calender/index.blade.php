@extends('components.layout.layout')
@section('content')
@include('ferwafa.layout._aside')
@include('ferwafa.layout.header')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-flex">
                            <div>
                                <h5 class="card-title">Season Calender</h5>
                            </div>
                         <div class="ms-auto">
                            <select class="form-control form-control-line" name="season">
                                    <option value="2018 - 2019">2018 - 2019</option>
                                    <option value="2019 - 2020">2019 - 2020</option>
                                    <option value="2021 - 2022" selected>2021 - 2022</option>
                                    <option value="2022 - 2023">2022 - 2023</option>

                                </select>
                                    </div> 
                        </div>
                        <div class="message-center" style="height: 450px !important;">
                            <div id="select" class="table-responsive mt-3 no-wrap">
                                <table class="table vm no-th-brd pro-of-month">
                                    @foreach ($fixtures as $fixture)   
                                    <tbody>
                                       <tr class="active">
                
                                            <td style="text-align: right;">
                                          
                                            <span class="round"><img src="{{ asset('storage/'.$fixture->homelogo->logo.'') }}" alt="user" width="50" height="50">
                                           </span>

                                            </td>
                                            <td style="text-align: left;">
                                                                                                <h4 class="mt-2">{{ $fixture->home; }}</h4>
                                            </td>

                                            <td style="text-align: center;">
                                                <h6>{{ $fixture->time; }}</h6>
                                                <span class="text-muted">{{ $fixture->stadium; }}</span><br> 
                                                <span class="text-muted">Week {{ $fixture->week; }} Fixtures</span>
                                            
                                            </td>
                                            <td style="text-align: right;">
                                                <h4 class="mt-2">{{ $fixture->away; }}</h4>
                                            </td>
                                            <td style="text-align: left;">
                                           
                                            <span class="round"><img src="{{ asset('storage/'.$fixture->awaylogo->logo.'') }}" alt="user" width="50" height="50">
                                           </span>

                                            </td>
                                            <td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                </table>
                              <div>
                                {{ $fixtures->links() }}
                              </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="card card-body mailbox">
                    <h5 class="card-title mb-5">Upload season Calender</h5>
                    <form class="form-horizontal form-material mx-2" method="post" action="{{ route('store-calender') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="file" accept=".xlsx" name="file" class="form-control form-control-line" >
                            </div>
                            @error('file')<span x-data="{show: true}" x-init="setTimeout(()=> show = false , 2000)" x-show="show" class="text-danger">
                                {{ $message }}
                          </span>@enderror
                        </div>
                      
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button name="import" class="btn btn-success">Uploaded</button>
                            </div>
                        </div>
                    </form>
                 
                     @include('components.layout._flash-message')

                </div>
            </div>
        </div>
   
    </div>
</div>


@endsection
