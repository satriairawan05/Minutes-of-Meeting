<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveIssue extends Model
{
    use HasFactory;

    /**
     * Declaration table for Model
     */
    protected $table = 'archive_issues';

    /**
     * Declaration Primary Key for Table
     */
    protected $primaryKey = 'arc_issue_id';
}
