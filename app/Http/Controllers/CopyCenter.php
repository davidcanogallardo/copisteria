<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CopyCenter extends Controller {
    public function uwu(Request $request) {
        $controller = new SessionController;

        if (empty($request->all()) ) {
            return $controller->getSession($request);
        } else {
            $session = $request->session()->get('printers');

            //Añadir texto a la cola recibe un n_impresora como request e imprimir recibe impresora
            //Si uno de los dos está vacío, se ha hecho un request del otro
            if (!isset($request->all()["impresora"])) {
                $printerIndex = intval($request->all()["n_impresora"]);
                $text = $request->all()["texto"];
                array_push($session[$printerIndex]["queue"], $text);

                $request->session()->put('printers', $session);
                return $controller->getSession($request);
            }  else {
                $printerIndex = intval($request->all()["impresora"]);
                $letterCount = 0;
                $pages = $request->session()->get('pageCount');

                foreach ($session[$printerIndex]["queue"] as $text) {
                    $letterCount += strlen($text);
                }

                // var_dump($session[$printerIndex]["ink"]);
                // if ($letterCount > 0) {
                
                // }
                
                //Debería comprobar si letterCount es 0, es decir, que vas a imprimir
                //una página vacía, pero nadie te impide imprimir una hoja en blanco no?

                foreach ($session[$printerIndex]["ink"] as $ink =>  $value) {
                    if ($ink == "black") {
                        $session[$printerIndex]["ink"][$ink] -= $letterCount*0.25;
                    } else {
                        $session[$printerIndex]["ink"][$ink] -= $letterCount*0.15;
                    }
                }
                $pages += 1;

                $session[$printerIndex]["queue"] = [];
                $request->session()->put('printers', $session);
                $request->session()->put('pageCount', $pages);
                return $controller->getSession($request);
            }
        }
    }
}
