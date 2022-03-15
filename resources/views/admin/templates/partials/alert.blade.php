<script>

@if(session('success'))
    $.notify({
        // options
        message: '{{session('success')}}' 
    },{
        // settings
        type: 'success'
    });
@endif

@if(session('info'))
    $.notify({
        // options
        message: '{{session('info')}}' 
    },{
        // settings
        type: 'info'
    });
@endif

@if(session('danger'))
    $.notify({
        // options
        message: '{{session('danger')}}' 
    },{
        // settings
        type: 'danger'
    });
@endif

@if(session('warning'))
    $.notify({
        // options
        message: '{{session('warning')}}' 
    },{
        // settings
        type: 'warning'
    });
@endif
</script>

{{-- @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif --}}