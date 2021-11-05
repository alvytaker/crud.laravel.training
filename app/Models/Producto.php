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
 * Class Producto
 *
 * @property int $ID
 * @property string $SKU
 * @property string $CODIGO_BARRA
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property string $GRUPO
 * @property string $SUB_GRUPO
 * @property float $PRECIO_UNITARIO_VENTA
 * @property int|null $DIAS_VIDA_UTIL
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 * @property int $ID_MARCA
 * @property int $ID_PROVEEDOR
 *
 * @property Marca $marca
 * @property Proveedor $proveedor
 * @property Collection|DetalleFactura[] $detalle_facturas
 *
 * @package App\Models
 */
class Producto extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'producto';
	protected $primaryKey = 'ID';

	protected $casts = [
		'PRECIO_UNITARIO_VENTA' => 'float',
		'DIAS_VIDA_UTIL' => 'int',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int',
		'ID_MARCA' => 'int',
		'ID_PROVEEDOR' => 'int'
	];

	protected $fillable = [
		'SKU',
		'CODIGO_BARRA',
		'NOMBRE',
		'DESCRIPCION',
		'GRUPO',
		'SUB_GRUPO',
		'PRECIO_UNITARIO_VENTA',
		'DIAS_VIDA_UTIL',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION',
		'ID_MARCA',
		'ID_PROVEEDOR'
	];

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'ID_MARCA');
	}

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'ID_PROVEEDOR');
	}

	public function detalle_facturas()
	{
		return $this->hasMany(DetalleFactura::class, 'ID_PRODUCTO');
	}
}
