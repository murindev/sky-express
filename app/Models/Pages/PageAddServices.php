<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Pages\PageAddServices
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
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices newQuery()
 * @method static \Illuminate\Database\Query\Builder|PageAddServices onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAddServices whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PageAddServices withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PageAddServices withoutTrashed()
 * @mixin \Eloquent
 */
class PageAddServices extends Model
{
    use SoftDeletes;

    protected $table = 'page_add_services';
}
