<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    public $name;
    public $ink;
    public $queue;
    /**
     * Class constructor.
     */
    public function __construct($name) {
        $this->name = $name;
        $this->ink = [
            'black' => 100,
            'yellow' => 100,
            'blue' => 100,
            'magenta' => 100
        ];
        $this->queue = [];
    }
}
