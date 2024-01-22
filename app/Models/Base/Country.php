<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\City;
use App\Models\Region;
use App\Models\State;
use App\Models\Subregion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $numeric_code
 * @property string|null $iso2
 * @property string|null $phonecode
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * @property string|null $tld
 * @property string|null $native
 * @property string|null $region
 * @property int|null $region_id
 * @property string|null $subregion
 * @property int|null $subregion_id
 * @property string|null $nationality
 * @property string|null $timezones
 * @property string|null $translations
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $emoji
 * @property string|null $emojiU
 * @property Carbon|null $created_at
 * @property Carbon $updated_at
 * @property bool $flag
 * @property string|null $wikiDataId
 * 
 * @property Collection|City[] $cities
 * @property Collection|State[] $states
 *
 * @package App\Models\Base
 */
class Country extends Model
{
	protected $connection = 'mysql';
	protected $table = 'countries';

	protected $casts = [
		'region_id' => 'int',
		'subregion_id' => 'int',
		'latitude' => 'float',
		'longitude' => 'float',
		'flag' => 'bool'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function subregion()
	{
		return $this->belongsTo(Subregion::class);
	}

	public function cities()
	{
		return $this->hasMany(City::class);
	}

	public function states()
	{
		return $this->hasMany(State::class);
	}
}
