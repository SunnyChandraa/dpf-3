<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskAssign
 * 
 * @property int $id
 * @property int|null $id_task
 * @property int|null $pic
 * @property int|null $anggota
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property MTask|null $m_task
 * @property Pegawai|null $pegawai
 *
 * @package App\Models
 */
class TaskAssign extends Model
{
	protected $table = 'task_assign';

	protected $casts = [
		'id_task' => 'int',
		'pic' => 'int',
		'anggota' => 'int'
	];

	protected $fillable = [
		'id_task',
		'pic',
		'anggota',
		'created_by',
		'updated_by'
	];

	public function m_task()
	{
		return $this->belongsTo(MTask::class, 'id_task');
	}

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'anggota');
	}
}
