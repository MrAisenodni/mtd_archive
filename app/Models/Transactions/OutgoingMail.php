<?php

namespace App\Models\Transactions;

use App\Models\Masters\{
    LetterStatus,
    LetterType,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingMail extends Model
{
    use HasFactory;

    protected $table = 'trx_outgoing_mail';

    public function letter_status()
    {
        return $this->belongsTo(LetterStatus::class)->select('id', 'name')->where('disabled', 0);
    }

    public function letter_type()
    {
        return $this->belongsTo(LetterType::class)->select('id', 'name')->where('disabled', 0);
    }
}
