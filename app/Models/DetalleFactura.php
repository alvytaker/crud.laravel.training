<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetalleFactura
 *
 * @property int $ID
 * @property int $CANTIDAD_PRODUCTO
 * @property float $COSTO_UNITARIO
 * @property float $COSTO_ACUMULADO
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 * @property int $ID_PRODUCTO
 * @property int $ID_FACTURA
 * @property int $ID_SUCURSAL
 *
 * @property Factura $factura
 * @property Producto $producto
 *
 * @package App\Models
 */
class DetalleFactura extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'detalle_factura';
	protected $primaryKey = 'ID';

	protected $casts = [
		'CANTIDAD_PRODUCTO' => 'int',
		'COSTO_UNITARIO' => 'float',
		'COSTO_ACUMULADO' => 'float',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int',
		'ID_PRODUCTO' => 'int',
		'ID_FACTURA' => 'int',
		'ID_SUCURSAL' => 'int'
	];

	protected $fillable = [
		'CANTIDAD_PRODUCTO',
		'COSTO_UNITARIO',
		'COSTO_ACUMULADO',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION',
		'ID_PRODUCTO',
		'ID_FACTURA',
		'ID_SUCURSAL'
	];

	public function factura()
	{
		return $this->belongsTo(Factura::class, 'ID_FACTURA');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'ID_PRODUCTO');
	}
}
