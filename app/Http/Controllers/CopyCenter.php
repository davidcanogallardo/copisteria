<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CopyCenter extends Controller {
    public function uwu(Request $request) {
        $controller = new SessionController;
        $session = $controller->getSession($request);
        return view('home', ['session' => $session]);
    }

    public function addToQueue(Request $request) {
        $controller = new SessionController;
        $session = $controller->getSession($request)['printers'];
        
        $printerIndex = intval($request->all()["n_impresora"]);
        $text = $request->all()["texto"];
        array_push($session[$printerIndex]["queue"], $text);
        $request->session()->put('printers', $session);
        
        return view('home', ['session' => $request->session()->all()]);
    }

    public function printQueue(Request $request) {
        $controller = new SessionController;
        $session = $controller->getSession($request)['printers'];
        $pages = $controller->getSession($request)['pageCount'];

        $printerIndex = intval($request->all()["impresora"]);
        $letterCount = 0;
        
        foreach ($session[$printerIndex]["queue"] as $text) {
            $letterCount += strlen(str_replace(' ', '', $text));
        }

        foreach ($session[$printerIndex]["ink"] as $ink =>  $value) {
            if ($ink == "black") {
                $session[$printerIndex]["ink"][$ink] -= $letterCount*0.25;
            } else {
                $session[$printerIndex]["ink"][$ink] -= $letterCount*0.15;
            }
        }
        //Debería comprobar si letterCount es 0, es decir, que vas a imprimir
        //una página vacía, pero nadie te impide imprimir una hoja en blanco no?        
        $pages += 1;

        $session[$printerIndex]["queue"] = [];
        $request->session()->put('printers', $session);
        $request->session()->put('pageCount', $pages);

        return view('home', ['session' => $request->session()->all()]);
    }
}
