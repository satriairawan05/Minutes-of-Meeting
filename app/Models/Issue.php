<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issues';
    protected $primaryKey = 'issue_id';

    public $incrementing = true;
    public $timestamps = true;
}
