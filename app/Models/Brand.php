<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
	public function products()
	{
	    return $this->hasMany(Product::class);
	}
}
