<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TRiwayatPegawai
 * 
 * @property int $id
 * @property int|null $id_pegawai
 * @property int|null $id_cabang_dpf
 * @property int|null $id_departemen
 * @property int|null $id_posisi
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property MCabangDpf|null $m_cabang_dpf
 * @property Pegawai|null $pegawai
 * @property MDivisi|null $m_divisi
 * @property MPosisi|null $m_posisi
 *
 * @package App\Models
 */
class TRiwayatPegawai extends Model
{
	protected $table = 't_riwayat_pegawai';

	protected $casts = [
		'id_pegawai' => 'int',
		'id_cabang_dpf' => 'int',
		'id_departemen' => 'int',
		'id_posisi' => 'int',
		'start_date' => 'datetime',
		'end_date' => 'datetime'
	];

	protected $fillable = [
		'id_pegawai',
		'id_cabang_dpf',
		'id_departemen',
		'id_posisi',
		'start_date',
		'end_date',
		'created_by',
		'updated_by'
	];

	public function m_cabang_dpf()
	{
		return $this->belongsTo(MCabangDpf::class, 'id_cabang_dpf');
	}

	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class, 'id_pegawai');
	}

	public function m_divisi()
	{
		return $this->belongsTo(MDivisi::class, 'id_departemen');
	}

	public function m_posisi()
	{
		return $this->belongsTo(MPosisi::class, 'id_posisi');
	}
}
