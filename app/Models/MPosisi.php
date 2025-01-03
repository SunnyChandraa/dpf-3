<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MPosisi
 * 
 * @property int $id
 * @property string|null $nama_posisi
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property Collection|TRiwayatPegawai[] $t_riwayat_pegawais
 *
 * @package App\Models
 */
class MPosisi extends Model
{
	protected $table = 'm_posisi';

	protected $fillable = [
		'nama_posisi',
		'created_by',
		'updated_by'
	];

	public function t_riwayat_pegawais()
	{
		return $this->hasMany(TRiwayatPegawai::class, 'id_posisi');
	}
}
