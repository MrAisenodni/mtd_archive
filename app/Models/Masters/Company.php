<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'mst_company';

    public function ward()
    {
        return $this->belongsTo(Ward::class)->select('id', 'name', 'post_code')->where('disabled', 0);
    }
}
