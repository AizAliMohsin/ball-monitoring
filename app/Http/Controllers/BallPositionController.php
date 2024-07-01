<?php

namespace App\Http\Controllers;

use App\Models\BallPosition;
use Illuminate\Http\Request;

class BallPositionController extends Controller
{
    public function getPosition()
    {
        $position = BallPosition::latest()->first();
        return response()->json($position);
    }
}
