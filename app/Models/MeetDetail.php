<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetDetail extends Model
{
    use HasFactory;

    protected $table = 'meets_details';
    protected $guarded = 'id';

    protected $fillable = [
        'project',
        'tracker',
        'subject',
        'description',
        'status',
        'priority',
        'start_daye',
        'end_date',
        'file',
        'is_private'
    ];
}
