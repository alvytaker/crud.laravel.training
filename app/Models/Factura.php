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
 * Class Factura
 *
 * @property int $ID
 * @property int $ID_SUCURSAL
 * @property Carbon $FECHA
 * @property float $SUBTOTAL
 * @property float $IVA
 * @property float|null $DESCUENTO
 * @property float $TOTAL
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 * @property int $ID_EMPLEADO
 * @property int $ID_CLIENTE
 *
 * @property Cliente $cliente
 * @property Empleado $empleado
 * @property Collection|DetalleFactura[] $detalle_facturas
 *
 * @package App\Models
 */
class Factura extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'factura';
	protected $primaryKey = 'ID';

	protected $casts = [
		'ID_SUCURSAL' => 'int',
		'SUBTOTAL' => 'float',
		'IVA' => 'float',
		'DESCUENTO' => 'float',
		'TOTAL' => 'float',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int',
		'ID_EMPLEADO' => 'int',
		'ID_CLIENTE' => 'int'
	];

	protected $dates = [
		'FECHA'
	];

	protected $fillable = [
		'ID_SUCURSAL',
		'FECHA',
		'SUBTOTAL',
		'IVA',
		'DESCUENTO',
		'TOTAL',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION',
		'ID_EMPLEADO',
		'ID_CLIENTE'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'ID_CLIENTE');
	}

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'ID_EMPLEADO');
	}

	public function detalle_facturas()
	{
		return $this->hasMany(DetalleFactura::class, 'ID_FACTURA');
	}
}
