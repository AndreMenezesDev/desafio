<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class InfoController extends Controller
{
    public function index()
    {
        $obj = (object)['version' => 'v0.0.1','env' => App::environment()];
        return response()->json($obj, Response::HTTP_OK);
    }
}
