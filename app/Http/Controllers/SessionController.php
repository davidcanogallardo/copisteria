<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller {
    public function setSession(Request $request) {
        $data = [];
        $images = ["A2.jpg","A3.jpg","A4.jpg"];
        for ($i=0; $i < 3; $i++) { 
            $printer = [
                "name" => "Impresora " . $i+1,
                "ink" => [
                    'black' => 100,
                    'yellow' => 100,
                    'blue' => 100,
                    'magenta' => 100
                ],
                "queue" => [],
                "image" => $images[$i]
            ];            
            array_push($data, $printer);
        }
        $request->session()->put('printers', $data);
        $request->session()->put('pageCount', 0);
        $session = $request->session()->all();
        // var_dump($data);
        return view('home', ['session' => $session]);
    }
    
    public function getSession(Request $request) {
        // var_dump($request->all());
        if($request->session()->has('printers')) {
            // var_dump("sesion detectada");
            $session = $request->session()->all();
            return view('home', ['session' => $session]);
        } else {
            // var_dump("nueva sesión");
            return $this->setSession($request);
        }
    }

    public function resetSession(Request $request) {
        // var_dump("destroy");
        Session::flush();
        // return view("welcome");
        return;
    }
}
