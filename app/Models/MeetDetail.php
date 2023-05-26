<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetDetail extends Model
{
    use HasFactory;

    protected $table = 'meet_details';
    protected $primaryKey = 'id';

    public $incrementing = false;
    public $timestamps = true;
}
