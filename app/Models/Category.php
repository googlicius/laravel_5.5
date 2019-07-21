<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 02:52:20 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $items
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'category';

	protected $fillable = [
		'name'
	];

	public function items()
	{
		return $this->hasMany(\App\Models\Item::class);
	}

	/**
	 * Create new category by name if not exists.
	 */
	public static function createNewIfNotExists($name) {
		if(!$category = self::where('name', $name)->first()) {
			$category = new self;
			$category->name = $name;
			$category->save();
		}
		return $category;
	}
}
