<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 * 
 * @property int $ID
 * @property string $NOMBRE
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Marca extends Model
{
	protected $table = 'marca';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'NOMBRE'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'ID_MARCA');
	}
}
