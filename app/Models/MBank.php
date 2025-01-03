<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MBank
 * 
 * @property int $id
 * @property string|null $nama_bank
 * @property string|null $singkatan
 * @property Carbon $created_at
 * @property string|null $created_by
 * @property Carbon|null $updated_at
 * @property string|null $updated_by
 * 
 * @property Collection|Pegawai[] $pegawais
 *
 * @package App\Models
 */
class MBank extends Model
{
	protected $table = 'm_bank';

	protected $fillable = [
		'nama_bank',
		'singkatan',
		'created_by',
		'updated_by'
	];

	public function pegawais()
	{
		return $this->hasMany(Pegawai::class, 'id_bank');
	}
}
