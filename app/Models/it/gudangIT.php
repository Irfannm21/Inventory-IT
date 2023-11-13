<?php

namespace App\Models\it;

use Illuminate\Database\Eloquent\Model;

class gudangIT extends Model
{
    protected $fillable = [];

    public function gudangitable()
    {
        return $this->morphTo();
    }
}
