@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            New Video
            <form method="post" action="{{route('store')}}">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="title" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="image">Video</label>
                        <input type="file" class="form-control" id="image" name="image" wire:model="image">
                        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        <div wire:loading wire:target="image">Uploading...</div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
