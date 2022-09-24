<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UI\ExpressDelivery
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $text
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery newQuery()
 * @method static \Illuminate\Database\Query\Builder|ExpressDelivery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpressDelivery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ExpressDelivery withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ExpressDelivery withoutTrashed()
 * @mixin \Eloquent
 */
class ExpressDelivery extends Model
{
    use SoftDeletes;

    protected $table = 'block-express-delivery';
}
