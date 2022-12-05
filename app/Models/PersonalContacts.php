<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PersonalContacts
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property int $user_id
 * @property string|null $fio
 * @property string|null $organisation
 * @property string|null $phone
 * @property string|null $country_id
 * @property string|null $city_id
 * @property string|null $city_name
 * @property string|null $zip
 * @property string|null $street
 * @property string|null $building
 * @property string|null $office
 * @property string|null $info
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereCityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereFio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereOrganisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereZip($value)
 * @mixin \Eloquent
 * @property int|null $street_id
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereStreetId($value)
 * @property string|null $street_type
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalContacts whereStreetType($value)
 */
class PersonalContacts extends Model
{
    protected $table = 'personal_contacts';
    protected $guarded = [];
}
