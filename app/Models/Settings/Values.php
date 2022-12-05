<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Settings\Values
 *
 * @property int $id
 * @property string $order
 * @property string $active
 * @property string $title
 * @property string $slug
 * @property string $value
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Values newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Values newQuery()
 * @method static \Illuminate\Database\Query\Builder|Values onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Values query()
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Values whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|Values withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Values withoutTrashed()
 * @mixin \Eloquent
 */
class Values extends Model
{
    use SoftDeletes;
}
