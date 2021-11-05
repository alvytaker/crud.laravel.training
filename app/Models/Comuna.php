<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comuna
 *
 * @property int $id
 * @property string $name
 * @property int $region_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Regione $regione
 *
 * @package App\Models
 */
class Comuna extends Model
{
	protected $table = 'comunas';

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'name',
		'region_id'
	];

	public function regione()
	{
		return $this->belongsTo(Region::class, 'region_id');
	}
}
