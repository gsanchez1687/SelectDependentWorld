<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Country;
use App\Models\Subregion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $id
 * @property string $name
 * @property string|null $translations
 * @property Carbon|null $created_at
 * @property Carbon $updated_at
 * @property bool $flag
 * @property string|null $wikiDataId
 * 
 * @property Collection|Country[] $countries
 * @property Collection|Subregion[] $subregions
 *
 * @package App\Models\Base
 */
class Region extends Model
{
	protected $connection = 'mysql';
	protected $table = 'regions';

	protected $casts = [
		'flag' => 'bool'
	];

	public function countries()
	{
		return $this->hasMany(Country::class);
	}

	public function subregions()
	{
		return $this->hasMany(Subregion::class);
	}
}
