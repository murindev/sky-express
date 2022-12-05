<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UI\Offices
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $schedule
 * @property string|null $email
 * @property string|null $lat
 * @property string|null $lon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Offices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offices query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereZip($value)
 * @mixin \Eloquent
 * @property string|null $code
 * @property string|null $schedule_to
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offices whereScheduleTo($value)
 */
class Offices extends Model
{
    protected $table = 'block-offices';
}
