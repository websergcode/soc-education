<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Television
 *
 * @property int $id
 * @property string $brand
 * @property string $model
 * @property int $size
 * @property string $description
 * @property float $price
 * @property bool $is_smart
 * @property string|null $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Television extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'size',
        'description',
        'price',
        'is_smart',
        'image',
    ];
}
