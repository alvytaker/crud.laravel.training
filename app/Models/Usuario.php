<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usuario
 *
 * @property int $ID
 * @property int|null $ID_EMPLEADO
 * @property string $USUARIO
 * @property string $CONTRASENIA
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 *
 * @property Empleado|null $empleado
 *
 * @package App\Models
 */
class Usuario extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'usuario';
	protected $primaryKey = 'ID';

	protected $casts = [
		'ID_EMPLEADO' => 'int',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int'
	];

	protected $fillable = [
		'ID_EMPLEADO',
		'USUARIO',
		'CONTRASENIA',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION'
	];

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'ID_EMPLEADO');
	}
}
