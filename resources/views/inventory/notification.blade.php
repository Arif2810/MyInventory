@if (session('pesan'))
<div class="alert alert-info" role="alert">
    <b>status</b> : {{ session('pesan') }}
</div>
@endif