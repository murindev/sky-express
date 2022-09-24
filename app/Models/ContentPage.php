<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Content
 *
 * @property int $id
 * @property string $order
 * @property string $active
 * @property string $slug
 * @property string $meta_title
 * @property string $meta_description
 * @property string $title
 * @property string $content
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage newQuery()
 * @method static \Illuminate\Database\Query\Builder|ContentPage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentPage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ContentPage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ContentPage withoutTrashed()
 * @mixin \Eloquent
 */
class ContentPage extends Model
{
    use SoftDeletes;

    protected $table = 'contents';
}
