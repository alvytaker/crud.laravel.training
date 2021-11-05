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
 * Class Empleado
 *
 * @property int $ID
 * @property int $ID_CARGO
 * @property int $ID_SUCURSAL
 * @property string $CORRELATIVO
 * @property string $NOMBRE
 * @property float|null $TELEFONO_FIJO
 * @property float|null $TELEFONO_MOVIL
 * @property string|null $CORREO
 * @property Carbon $FECHA_CREACION
 * @property Carbon $FECHA_MODIFICACION
 * @property string|null $FECHA_ELIMINACION
 * @property int $ID_USUARIO_CREACION
 * @property int $ID_USUARIO_MODIFICACION
 *
 * @property Cargo $cargo
 * @property Sucursal $sucursal
 * @property Collection|Factura[] $facturas
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Empleado extends Model
{
	use SoftDeletes;
	const CREATED_AT = 'FECHA_CREACION';
	const UPDATED_AT = 'FECHA_MODIFICACION';
	const DELETED_AT = 'FECHA_ELIMINACION';
	protected $table = 'empleado';
	protected $primaryKey = 'ID';

	protected $casts = [
		'ID_CARGO' => 'int',
		'ID_SUCURSAL' => 'int',
		'TELEFONO_FIJO' => 'float',
		'TELEFONO_MOVIL' => 'float',
		'ID_USUARIO_CREACION' => 'int',
		'ID_USUARIO_MODIFICACION' => 'int'
	];

	protected $fillable = [
		'ID_CARGO',
		'ID_SUCURSAL',
		'CORRELATIVO',
		'NOMBRE',
		'TELEFONO_FIJO',
		'TELEFONO_MOVIL',
		'CORREO',
		'ID_USUARIO_CREACION',
		'ID_USUARIO_MODIFICACION'
	];

	public function cargo()
	{
		return $this->belongsTo(Cargo::class, 'ID_CARGO');
	}

	public function sucursal()
	{
		return $this->belongsTo(Sucursal::class, 'ID_SUCURSAL');
	}

	public function facturas()
	{
		return $this->hasMany(Factura::class, 'ID_EMPLEADO');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'ID_EMPLEADO');
	}
}
