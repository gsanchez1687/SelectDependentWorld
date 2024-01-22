<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Country;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property string $state_code
 * @property int $country_id
 * @property string $country_code
 * @property float $latitude
 * @property float $longitude
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property bool $flag
 * @property string|null $wikiDataId
 * 
 * @property State $state
 * @property Country $country
 *
 * @package App\Models\Base
 */
class City extends Model
{
	protected $connection = 'mysql';
	protected $table = 'cities';

	protected $casts = [
		'state_id' => 'int',
		'country_id' => 'int',
		'latitude' => 'float',
		'longitude' => 'float',
		'flag' => 'bool'
	];

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function country()
	{
		return $this->belongsTo(Country::class);
	}
}
