<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller 
{


    // public static function middleware(){
    //     return [new Middleware(CheckRoleMiddleware::class ,only:['store'])  ];
    // }

    // public static function middleware(){
    //     return [new Middleware(CheckRoleMiddleware::class ,except:['index'])];
    // }

    function index()
    {
        return view('post.post_index');
    }

    function store(){
        dd(request()->all());
    }
}
