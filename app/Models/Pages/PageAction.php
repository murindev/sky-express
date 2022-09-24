<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pages\PageAction
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $slug
 * @property string $meta_title
 * @property string $meta_description
 * @property string $title
 * @property string $content
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageAction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PageAction extends Model
{
    protected $table = 'page_actions';
}
