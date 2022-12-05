<?php

namespace App\Models\Props;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Props\PropsStandardDimensions
 *
 * @property int $id
 * @property string $title
 * @property int $active
 * @property int $order
 * @property int $short
 * @property int $width
 * @property int $height
 * @property int $length
 * @property float $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropsStandardDimensions whereWidth($value)
 * @mixin \Eloquent
 */
class PropsStandardDimensions extends Model
{
    protected $table = 'props_standard_dimensions';
}
