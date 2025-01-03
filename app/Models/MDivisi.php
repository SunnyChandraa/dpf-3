<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MDivisi
 * 
 * @property int $id
 * @property string|null $nama_divisi
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property Collection|TRiwayatPegawai[] $t_riwayat_pegawais
 *
 * @package App\Models
 */
class MDivisi extends Model
{
	protected $table = 'm_divisi';

	protected $fillable = [
		'nama_divisi',
		'created_by',
		'updated_by'
	];

	public function t_riwayat_pegawais()
	{
		return $this->hasMany(TRiwayatPegawai::class, 'id_departemen');
	}
}
