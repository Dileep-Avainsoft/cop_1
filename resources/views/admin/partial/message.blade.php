@if ($message = Session::get('success'))
<div class="alert alert-success alert-block"><strong>{{ $message }}</strong></div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
