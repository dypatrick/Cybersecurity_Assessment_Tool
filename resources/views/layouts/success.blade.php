<!--Validation success handling coming from the controller-->
@if(session('success'))
<div class="alert alert-success alert-dismissible pb-0">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        {{ session('success') }}
    </ul>
</div>
@endif