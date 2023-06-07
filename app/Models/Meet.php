<?php

namespace App\Models;

use App\Models\Issue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meet extends Model
{
    use HasFactory;

    protected $table = 'meets';
    protected $primaryKey = 'meet_id';

    public $incrementing = true;
    public $timestamps = true;

    public function issue() : BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }
}
