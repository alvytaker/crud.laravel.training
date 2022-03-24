<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Regione
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Comuna[] $comunas
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'regiones';

	protected $fillable = [
		'name'
	];

	public function comuna()
	{
		return $this->hasMany(Comuna::class, 'region_id');
	}
}
