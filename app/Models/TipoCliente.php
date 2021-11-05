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
 * Class TipoCliente
 *
 * @property int $ID
 * @property string $DESCRIPCION
 * @property float $DESCUENTO
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 *
 * @property Collection|Cliente[] $clientes
 *
 * @package App\Models
 */
class TipoCliente extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'tipo_cliente';
	protected $primaryKey = 'ID';

	protected $casts = [
		'DESCUENTO' => 'float',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int'
	];

	protected $fillable = [
		'DESCRIPCION',
		'DESCUENTO',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class, 'ID_TIPO_CLIENTE');
	}
}
