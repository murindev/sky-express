<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\UI\EasyDeparture
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture newQuery()
 * @method static \Illuminate\Database\Query\Builder|EasyDeparture onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture query()
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EasyDeparture whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|EasyDeparture withTrashed()
 * @method static \Illuminate\Database\Query\Builder|EasyDeparture withoutTrashed()
 * @mixin \Eloquent
 */
class EasyDeparture extends Model
{
    use SoftDeletes;

    protected $table = 'block-easy-departures';
}
