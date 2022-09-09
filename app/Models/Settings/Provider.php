<?php

namespace App\Models\Settings;

use App\Models\Masters\Ward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'stg_provider';

    public function provider_ward()
    {
        return $this->belongsTo(Ward::class, 'provider_ward_id', 'id')->select('id', 'name', 'post_code')->where('disabled', 0);
    }

    public function owner_ward()
    {
        return $this->belongsTo(Ward::class, 'owner_ward_id', 'id')->select('id', 'name', 'post_code')->where('disabled', 0);
    }
}
