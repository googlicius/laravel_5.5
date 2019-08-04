<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 02:52:20 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Item
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property int $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Category $category
 *
 * @package App\Models
 */
class Item extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'item';

	protected $casts = [
		'id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'title',
		'description',
		'link',
		'category_id'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	/**
     * Scope a query from request
     * 
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
	public function scopeSearch($query) {
		if(request()->category_id)
        {
            $query->where('category_id', request()->category_id);
        }
		return $query;
	}
}
