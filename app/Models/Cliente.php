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
 * Class Cliente
 *
 * @property int $ID
 * @property string $CODIGO
 * @property string $NOMBRE
 * @property string|null $TELEFONO
 * @property string|null $DIRECCION
 * @property string $RUT
 * @property string|null $CORREO
 * @property Carbon $FECHA_REGISTRO
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 * @property int $ID_TIPO_CLIENTE
 *
 * @property TipoCliente $tipo_cliente
 * @property Collection|Factura[] $facturas
 *
 * @package App\Models
 */
class Cliente extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'cliente';
	protected $primaryKey = 'ID';

	protected $casts = [
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int',
		'ID_TIPO_CLIENTE' => 'int'
	];

	protected $dates = [
		'FECHA_REGISTRO'
	];

	protected $fillable = [
		'CODIGO',
		'NOMBRE',
		'TELEFONO',
		'DIRECCION',
		'RUT',
		'CORREO',
		'FECHA_REGISTRO',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION',
		'ID_TIPO_CLIENTE'
	];

	public function tipo_cliente()
	{
		return $this->belongsTo(TipoCliente::class, 'ID_TIPO_CLIENTE');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'ID_CLIENTE');
	}
}
