<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DailyReport
 * 
 * @property int $id
 * @property int|null $id_task
 * @property int|null $id_pegawai
 * @property string|null $notes
 * @property Carbon|null $tanggal
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
class DailyReport extends Model
{
	protected $table = 'daily_report';

	protected $casts = [
		'id_task' => 'int',
		'id_pegawai' => 'int',
		'tanggal' => 'datetime'
	];

	protected $fillable = [
		'id_task',
		'id_pegawai',
		'notes',
		'tanggal',
		'created_by',
		'updated_by'
	];

	public function m_task()
	{
		return $this->belongsTo(MTask::class, 'id_task');
	}

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}
}
