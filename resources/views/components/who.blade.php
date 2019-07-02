@if (Auth::guard('web')->check())

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <p class="text-success">
        You are logged In as a <strong>USER</strong>
    </p>
@else
<p class="text-danger">
    You are logged Out as a <strong>USER</strong>
</p>
@endif

@if (Auth::guard('admin')->check())

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <p class="text-success">
        You are logged In as an <strong>ADMIN</strong>
    </p>
@else
<p class="text-danger">
    You are logged Out as an <strong>ADMIN</strong>
</p>
@endif


