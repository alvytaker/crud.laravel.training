<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cargo
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 *
 * @property Collection|Empleado[] $empleados
 *
 * @package App\Models
 */
class Cargo extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'cargo';
	protected $primaryKey = 'ID';

	protected $casts = [
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int'
	];

	protected $fillable = [
		'NOMBRE',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION'
	];

	public function empleados()
	{
		return $this->hasMany(Empleado::class, 'ID_CARGO');
	}
}
