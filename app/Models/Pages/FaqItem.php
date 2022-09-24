<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Pages\FaqItem
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property int $faq_id
 * @property string|null $title
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|FaqItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FaqItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FaqItem withoutTrashed()
 * @mixin \Eloquent
 */
class FaqItem extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'page_faq_items';
}
