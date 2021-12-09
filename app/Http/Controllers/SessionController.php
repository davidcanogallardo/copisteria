<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function setSession(Request $request) {
        $data = [];
        $images = ["A2.jpg","A3.jpg","A4.jpg"];
        for ($i=0; $i < 3; $i++) { 
            $printer = [
                "name" => "Impresora " . $i+1,
                "ink" => [
                    'black' => 56,
                    'yellow' => 23,
                    'blue' => 100,
                    'magenta' => 100
                ],
                "queue" => [],
                "image" => $images[$i]
            ];            
            array_push($data, $printer);
        }
        $request->session()->put('printers', $data);
        
        return view('home', ['data' => $data]);
    }
    
    public function accessSessionData(Request $request) {
        if($request->session()->has('data')) {
            var_dump("sesion detectada");
            $data = $request->session()->get('data');
            return view('home', ['data' => $data]);
        } else {
            var_dump("nueva sesión");
            return $this->setSession($request);
        }
    }

    public function resetSession(Request $request) {
        var_dump("destroy");
        Session::flush();
        // return view("welcome");
        return;
    }
}
