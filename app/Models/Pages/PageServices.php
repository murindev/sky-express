<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Pages\PageServices
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string|null $slug
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $title
 * @property string|null $content
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices newQuery()
 * @method static \Illuminate\Database\Query\Builder|PageServices onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageServices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PageServices withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PageServices withoutTrashed()
 * @mixin \Eloquent
 */
class PageServices extends Model
{
    use SoftDeletes;

    protected $table = 'page_services';
}
