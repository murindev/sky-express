<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Pages\Faq
 *
 * @property int $id
 * @property string $order
 * @property string $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pages\FaqItem[] $faqItems
 * @property-read int|null $faq_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Query\Builder|Faq onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Faq withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Faq withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pages\FaqItem[] $questions
 * @property-read int|null $questions_count
 */
class Faq extends Model
{
    use SoftDeletes;

    protected $table = 'page_faq';

    public function questions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FaqItem::class, 'faq_id', 'id');
    }
}
