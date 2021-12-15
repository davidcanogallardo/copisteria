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
        return $request->session()->all();
    }
    
    public function getSession(Request $request) {
        if($request->session()->has('printers')) {
            return $request->session()->all();
        } else {
            return $this->setSession($request);
        }
    }

    public function resetSession() {
        Session::flush();
        return;
    }
}
