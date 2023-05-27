<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meet extends Model
{
    use HasFactory;

    protected $table = 'meets';
    protected $primaryKey = 'meet_id';

    public $incrementing = false;
    public $timestamps = true;

    /**
     * Get the dosument that owns the Meet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dosument(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

}
