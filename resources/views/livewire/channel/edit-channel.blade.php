<div>
  @if (session()->has('message'))
    <div class="alert alert-success col-md-12">
        {{ session('message') }}
    </div>
    @endif
    @if($channel->image)
    <img src="{{asset('/images/' . $channel->image)}}"/>
    @endif
  <form wire:submit.prevent="update">
          <div class="form-group">
              <input type="file" class="form-control" wire:model="image" />
          </div>
          <div class="form-group">
          @if ($image)
        <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
          @endif
    </div>
          @error('image')<span class="alert alert-danger my-2">{{$message}}@enderror</span>

          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" wire:model="channel.name" value="{{$channel->name}}"/>
          </div>
          @error('channel.name')<span class="alert alert-danger my-2">{{$message}}@enderror</span>

          <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" wire:model="channel.slug" value="{{$channel->slug}}"/>
          </div>
          @error('channel.slug')<span class="alert alert-danger my-2">{{$message}}@enderror</span>

          <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" wire:model="channel.description" cols="30" rows="4">{{$channel->description}}</textarea>

          </div>
          @error('channel.description')<span class="alert alert-danger my-2">{{$message}}@enderror</span>

          <div class="form-group">
              <button type="submit" class="btn btn-primary my-3">Update</button>
          </div>
  </form>
</div>
