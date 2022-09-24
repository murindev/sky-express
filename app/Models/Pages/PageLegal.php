<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pages\PageLegal
 *
 * @property int $id
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $slug
 * @property int|null $order
 * @property int|null $active
 * @property string|null $title
 * @property string|null $content
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageLegal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageLegal extends Model
{
    protected $table = 'page_legals';
}
