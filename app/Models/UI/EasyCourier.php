<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UI\CallCourier
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier newQuery()
 * @method static \Illuminate\Database\Query\Builder|EasyCourier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier query()
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyCourier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|EasyCourier withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EasyCourier withoutTrashed()
 * @mixin \Eloquent
 */
class EasyCourier extends Model
{
    use SoftDeletes;

    protected $table = 'block-easy-couriers';
}
