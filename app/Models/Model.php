<?php

namespace App\Models;

use App\Models\Traits\ResponseTrait;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Base;

class Model extends Base
{
    // use HasFactory;
    use ResponseTrait;

    public function saveLogNotify()
    {
        return redirect()->route('it.printers.index');
    }
}
