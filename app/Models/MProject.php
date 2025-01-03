<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MProject
 * 
 * @property int $id
 * @property string|null $nama_project
 * @property string|null $budget
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property Collection|MTask[] $m_tasks
 *
 * @package App\Models
 */
class MProject extends Model
{
	protected $table = 'm_project';

	protected $fillable = [
		'nama_project',
		'budget',
		'created_by',
		'updated_by'
	];

	public function m_tasks()
	{
		return $this->hasMany(MTask::class, 'id_project');
	}
}
