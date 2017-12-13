@extends('layouts.admin')

@section('content')

<h1>Media Files</h1>
<br>
<a href="{{ route('admin.media.create') }}">Upload New Media</a>
<br><br>
<hr>
<br>

@if(session('photo_deleted'))
    <div class="alert alert-success">
        {{ session()->pull('photo_deleted') }}
    </div>

@endif

@if(session('photos_deleted'))
    <div class="alert alert-success">
        {{ session()->pull('photos_deleted') }}
    </div>
@endif

@if(count($photos) > 0)
    <form method="POST" action="delete/media">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    <input class="btn btn-danger" type="submit" name="delete" value="Delete selected">
    <br><br>
    <table class="table table-striped">
        <thead>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Delete</th>
        </thead>
        @foreach($photos as $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                <td>{{ $photo->id }}</td>
                <td><img height="45px" width="45px" src="{{ $photo->file }}" /></td>
                <td>{{ $photo->file }}</td>
                <td>{{ $photo->created_at->diffForHumans() }}</td>
                <td>{{ $photo->updated_at->diffForHumans() }}</td>
                <input type="hidden" name="file" value="{{ $photo->id }}">
                <td><input class="btn btn-danger" type="submit" name="delete_single" value="Delete"></td>
            </tr>
        @endforeach
    </table>
    </form>
@else
    <h3>No media files for display</h3>
@endif

@stop

@section('scripts')

<script>
    $(document).ready(function(){
        $('#options').on('click', function() {
            if(this.checked) {
                $('.checkBoxes').each(function(){
                    this.checked = true;
                });
            } else {
                $('.checkBoxes').each(function(){
                    this.checked = false;
                });
            }
        });
    })
</script>

@stop