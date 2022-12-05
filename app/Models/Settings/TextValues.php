<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Settings\TextValues
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues newQuery()
 * @method static \Illuminate\Database\Query\Builder|TextValues onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues query()
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TextValues whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TextValues withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TextValues withoutTrashed()
 * @mixin \Eloquent
 */
class TextValues extends Model
{
    use SoftDeletes;

    protected $table = 'text_values';
}
