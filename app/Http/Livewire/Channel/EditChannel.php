<?php

namespace App\Http\Livewire\Channel;

use Livewire\Component;
use Livewire\WithFileUploads;
use Image;

class EditChannel extends Component
{
  public $channel;
  use WithFileUploads;
  public $image;
  protected $rules = [
    'channel.name' => 'required|max:255',
    'channel.slug' => 'required|max:255',
    'channel.description' => 'required|max:255',
  ];
  public function mount($channel){
    $this->channel = $channel;
  }
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
    public function update(){

      $this->validate();
      $this->channel->update([
        'name' => $this->channel->name,
        'slug' => $this->channel->slug,
        'description' => $this->channel->description,
      ]);
      if($this->image){
        $image = $this->image->storeAs('images', $this->channel->uid . '.png');
        $imageImage = explode('/', $image)[1];
        $img = Image::make(storage_path() . '/app/' . $image)
        ->encode('png')
        ->fit(80, 60, function ($constraint) {
            $constraint->upsize();
        })->save();
        $this->channel->update([
          'image' => $imageImage
        ]);
      }
      session()->flash('message', 'Channel is updated');
      return redirect()->route('channel.edit', ['channel'=> $this->channel->slug]);
    }
}
