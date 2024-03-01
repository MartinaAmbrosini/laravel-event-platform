<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;
use App\Models\Tag;

class ApiController extends Controller
{
    public function getTest(){
        return response ()->json([
            'status'=>'success',
            'message'=>'This is a TEST'
        ]);
    }
    public function getUsers (){

        $users = User::all();
        return response ()->json([
            'status'=>'success',
            'users'=> $users
        ]);
    }
    public function getEvents (){

        $events = Event::all();

        return response ()->json([
            'status'=>'success',
            'events'=>$events
        ]);
    }

    public function getTags (){

        $tags = Tag::all();
        return response ()->json([
            'status'=>'success',
            'tags'=>$tags
        ]);

    }
    
}




