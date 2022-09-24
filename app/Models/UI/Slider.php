<?php

namespace App\Models\UI;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UI\Slider
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string|null $type
 * @property string|null $btn
 * @property string|null $action
 * @property string|null $cite_before
 * @property string|null $cite_accent
 * @property string|null $cite_after
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereBtn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCiteAccent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCiteAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCiteBefore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Slider extends Model
{}
