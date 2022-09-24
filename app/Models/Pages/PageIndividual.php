<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Pages\PageIndividual
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
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual newQuery()
 * @method static \Illuminate\Database\Query\Builder|PageIndividual onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual query()
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PageIndividual whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PageIndividual withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PageIndividual withoutTrashed()
 * @mixin \Eloquent
 */
class PageIndividual extends Model
{
    use SoftDeletes;

    protected $table = 'page_individuals';
}
