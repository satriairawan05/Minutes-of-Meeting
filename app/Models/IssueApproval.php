<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueApproval extends Model
{
    use HasFactory;

    protected $table = 'issue_approvals';

    protected $primaryKey = 'ia_id';
}
