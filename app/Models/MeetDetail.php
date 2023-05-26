<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetDetail extends Model
{
    use HasFactory;

    protected $table = 'issues';
    protected $primaryKey = 'id';

    public $incrementing = false;
    public $timestamps = true;
}
