<?php

namespace App\Models\Transactions;

use App\Models\Masters\{
    LetterStatus,
    LetterType,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedMail extends Model
{
    use HasFactory;

    protected $table = 'trx_deleted_mail';

    public function incoming_mail()
    {
        return $this->belongsTo(IncomingMail::class, 'deleted_id', 'id')->where('disabled', 1);
    }
}
