
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyCenter extends Model
{
    use HasFactory;

    public $printers;
    
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->printers = [
            new Printer("Impresora 1"),
            new Printer("Impresora 2"),
            new Printer("Impresora 3")
        ];
    }
}
