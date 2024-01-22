<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Country;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subregion
 * 
 * @property int $id
 * @property string $name
 * @property string|null $translations
 * @property int $region_id
 * @property Carbon|null $created_at
 * @property Carbon $updated_at
 * @property bool $flag
 * @property string|null $wikiDataId
 * 
 * @property Region $region
 * @property Collection|Country[] $countries
 *
 * @package App\Models\Base
 */
class Subregion extends Model
{
	protected $connection = 'mysql';
	protected $table = 'subregions';

	protected $casts = [
		'region_id' => 'int',
		'flag' => 'bool'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function countries()
	{
		return $this->hasMany(Country::class);
	}
}
