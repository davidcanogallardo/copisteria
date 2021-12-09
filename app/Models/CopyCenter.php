
<?php
class CopyCenter {
    public function getCopyCenter() {
        $data = [];
        $printer = [
            "name" => "Impresora 1",
            "ink" => [
                'black' => 100,
                'yellow' => 100,
                'blue' => 100,
                'magenta' => 100
            ],
            "queue" => []
        ];
        for ($i=0; $i < 3; $i++) { 
            array_push($data, $printer);
        }
        return $data;

    }
}