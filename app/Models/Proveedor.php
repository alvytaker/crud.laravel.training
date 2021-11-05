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
 * Class Proveedor
 *
 * @property int $ID
 * @property string $NOMBRE
 * @property string $DIRECCION
 * @property int $TELEFONO
 * @property string|null $CORREO
 * @property string|null $RUT
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 *
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'proveedor';
	protected $primaryKey = 'ID';

	protected $casts = [
		'TELEFONO' => 'int',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int'
	];

	protected $fillable = [
		'NOMBRE',
		'DIRECCION',
		'TELEFONO',
		'CORREO',
		'RUT',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'ID_PROVEEDOR');
	}
}
