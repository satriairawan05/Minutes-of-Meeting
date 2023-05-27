<?php

namespace App\Models;

use App\Models\Meet;
use App\Models\MeetDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $guarded = 'id';

    /**
     * Get all of the meets for the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meets(): HasMany
    {
        return $this->hasMany(Meet::class,'meet_id');
    }

    /**
     * Get all of the issues for the Document
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issues(): HasMany
    {
        return $this->hasMany(MeetDetail::class,'id');
    }
}
