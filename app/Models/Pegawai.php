<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pegawai
 * 
 * @property int $id
 * @property string|null $nama
 * @property string|null $jenis_kelamin
 * @property string|null $tipe_user
 * @property string|null $kewarganegaraan
 * @property string|null $jenis_kartu_identitas
 * @property string|null $nomor_kartu_identitas
 * @property string|null $no_telp
 * @property string|null $tempat_lahir
 * @property Carbon|null $tanggal_lahir
 * @property string|null $agama
 * @property string|null $status_kawin
 * @property int|null $id_bank
 * @property string|null $nama_pemilik_bank
 * @property string|null $npwp
 * @property string|null $kode_ptkp
 * @property string|null $no_bpjs_ketenagakerjaan
 * @property string|null $no_bpjs_kesehatan
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property MBank|null $m_bank
 * @property Collection|DailyReport[] $daily_reports
 * @property Collection|TRiwayatPegawai[] $t_riwayat_pegawais
 * @property Collection|TaskAssign[] $task_assigns
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Pegawai extends Model
{
	protected $table = 'pegawai';

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'id_bank' => 'int'
	];

	protected $fillable = [
		'nama',
		'jenis_kelamin',
		'tipe_user',
		'kewarganegaraan',
		'jenis_kartu_identitas',
		'nomor_kartu_identitas',
		'no_telp',
		'tempat_lahir',
		'tanggal_lahir',
		'agama',
		'status_kawin',
		'id_bank',
		'nama_pemilik_bank',
		'npwp',
		'kode_ptkp',
		'no_bpjs_ketenagakerjaan',
		'no_bpjs_kesehatan',
		'created_by',
		'updated_by'
	];

	public function m_bank()
	{
		return $this->belongsTo(MBank::class, 'id_bank');
	}

	public function daily_reports()
	{
		return $this->hasMany(DailyReport::class, 'id_pegawai');
	}

	public function t_riwayat_pegawais()
	{
		return $this->hasMany(TRiwayatPegawai::class, 'id_pegawai');
	}

	public function task_assigns()
	{
		return $this->hasMany(TaskAssign::class, 'anggota');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_pegawai');
	}
}
