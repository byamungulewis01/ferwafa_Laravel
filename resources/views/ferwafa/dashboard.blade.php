@extends('components.layout.layout')
@section('content')
@include('ferwafa.layout._aside')
@include('ferwafa.layout.header')
<div class="page-wrapper">

  <div class="container-fluid">
      <!-- ============================================================== -->
      <div class="row">
          <!-- Start Notification -->
          <div class="col-lg-8 col-md-12">
              <div class="card card-body mailbox">
                  <h5 class="card-title">Next Fixtures</h5>
                  <div class="message-center" style="height: 420px !important;">
                  <div id="select" class="table-responsive mt-3 no-wrap">
                              <table class="table vm no-th-brd pro-of-month">

                              </table>
                          </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
          <div class="card card-body mailbox">
                              <h5 class="card-title">Suspended Player</h5>
                              @include('components.layout._flash-message') 
                          </div>
          </div>
      </div>
  </div>
  </div>
@endsection