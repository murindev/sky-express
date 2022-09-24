<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UI\SideSlider
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $btn
 * @property string|null $action
 * @property string|null $cite_before
 * @property string|null $cite_accent
 * @property string|null $cite_after
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider query()
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereBtn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereCiteAccent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereCiteAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereCiteBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SideSlider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SideSlider extends Model
{
    protected $table = 'block-side-sliders';
}
