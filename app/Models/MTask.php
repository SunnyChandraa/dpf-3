<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MTask
 * 
 * @property int $id
 * @property int|null $id_project
 * @property string|null $nama_task
 * @property string|null $priority
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property float|null $budget_plan
 * @property float|null $budget_realization
 * @property string|null $notes
 * @property string|null $status
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property MProject|null $m_project
 * @property Collection|DailyReport[] $daily_reports
 * @property Collection|TaskAssign[] $task_assigns
 *
 * @package App\Models
 */
class MTask extends Model
{
	protected $table = 'm_task';

	protected $casts = [
		'id_project' => 'int',
		'start_date' => 'datetime',
		'end_date' => 'datetime',
		'budget_plan' => 'float',
		'budget_realization' => 'float'
	];

	protected $fillable = [
		'id_project',
		'nama_task',
		'priority',
		'start_date',
		'end_date',
		'budget_plan',
		'budget_realization',
		'notes',
		'status',
		'created_by',
		'updated_by'
	];

	public function m_project()
	{
		return $this->belongsTo(MProject::class, 'id_project');
	}

	public function daily_reports()
	{
		return $this->hasMany(DailyReport::class, 'id_task');
	}

	public function task_assigns()
	{
		return $this->hasMany(TaskAssign::class, 'id_task');
	}
}
