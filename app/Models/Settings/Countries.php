<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Settings\Countries
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string|null $slug
 * @property string|null $name
 * @property string|null $alpha_short
 * @property string|null $alpha
 * @property string|null $digital
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Countries newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Countries newQuery()
 * @method static \Illuminate\Database\Query\Builder|Countries onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Countries query()
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereAlpha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereAlphaShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereDigital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Countries whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Countries withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Countries withoutTrashed()
 * @mixin \Eloquent
 */
class Countries extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}
