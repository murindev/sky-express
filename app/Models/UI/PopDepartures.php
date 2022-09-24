<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UI\PopDepartures
 *
 * @property int $id
 * @property string $order
 * @property string $active
 * @property string $from
 * @property string $to
 * @property string|null $price
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures query()
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PopDepartures whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PopDepartures extends Model
{
    protected $table = 'block-pop-departures';
}
