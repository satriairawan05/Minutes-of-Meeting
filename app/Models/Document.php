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
    protected $guarded = 'doc_id';
}
