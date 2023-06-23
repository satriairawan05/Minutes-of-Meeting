<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalHistory extends Model
{
    use HasFactory;

    protected $table = 'approval_histories';
    protected $primaryKey = 'app_his_id';

    public $incrementing = true;
    public $timestamps = true;
}
