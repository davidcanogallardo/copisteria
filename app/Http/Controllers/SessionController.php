<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CopyCenter;

class SessionController extends Controller
{
    public function setSession(Request $request) {
        $data = CopyCenter::getCopyCenter();
        // $data = [];
        $r = $request->session()->put('key',$data);
        return view('home', ['data' => $r]);
    }
    public function accessSessionData(Request $request) {
        if($request->session()->has('key')) {
            $data = $request->session()->get('key');
            return view('home', ['data' => $data]);
        } else {
            echo 'No data in the session';
        }
     }
}
