@if (Session::has('message'))
<div x-data="{show: true}" x-init="setTimeout(()=> show = false , 3000)" x-show="show" class="alert alert-danger fixed top-0" style="position: absolute; margin:20px;">
 {{ Session::get('message') }}
</div> 
@endif

@if (Session::has('success'))
<div x-data="{show: true}" x-init="setTimeout(()=> show = false , 3000)" x-show="show" class="alert alert-success fixed top-0" style="position: absolute; margin:20px;">
 {{ Session::get('success') }}
</div> 
@endif

@if (Session::has('fail'))
<div x-data="{show: true}" x-init="setTimeout(()=> show = false , 3000)" x-show="show" class="alert alert-danger fixed top-0" style="position: absolute; margin:20px;">
 {{ Session::get('fail') }}
</div> 
@endif

@if (Session::has('import_error'))
     @foreach (Session::get('import_error') as $failure)
     <div x-data="{show: true}" x-init="setTimeout(()=> show = false , 3000)" x-show="show" class="alert alert-danger fixed top-0" style="position: absolute; margin:20px;">
        {{ $failure->errors()[0] }}   at line {{ $failure->row(); }}
        </div> 
     @endforeach

@endif