<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'job_history';

    static public function getRecord($request)
    {
        $return = self::select('job_history.*')
                    ->orderBy('id', 'desc')
                    -> paginate(5);

        return $return;
    }

    public function get_user_name_single()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function get_job_single()
    {
        return $this->belongsTo(JobsModel::class, 'job_id');
    }
}
