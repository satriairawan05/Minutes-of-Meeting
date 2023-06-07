<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $table = 'archives';
    protected $primaryKey = 'archive_id';

    public $incrementing = true;
    public $timestamps = true;
}
