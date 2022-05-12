@if($message = session('message'))
    <div class="alert alert-{{ session('type') }}">{!! $message !!}</div>
@endif