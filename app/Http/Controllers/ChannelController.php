<?php

namespace App\Http\Controllers;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function edit(Channel $channel){
      //$channel = "Good";
      return view('channel.edit',compact(
        'channel'
      ));
    }
}
