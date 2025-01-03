<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MCabangDpf
 * 
 * @property int $id
 * @property string|null $nama_cabang
 * @property string|null $alamat_cabang
 * @property string|null $no_telp_cabang
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property Collection|TRiwayatPegawai[] $t_riwayat_pegawais
 *
 * @package App\Models
 */
class MCabangDpf extends Model
{
	protected $table = 'm_cabang_dpf';

	protected $fillable = [
		'nama_cabang',
		'alamat_cabang',
		'no_telp_cabang',
		'created_by',
		'updated_by'
	];

	public function t_riwayat_pegawais()
	{
		return $this->hasMany(TRiwayatPegawai::class, 'id_cabang_dpf');
	}
}
