<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class David extends Controller
{
    public function show($id)
    {
        return $id;
    }
}
