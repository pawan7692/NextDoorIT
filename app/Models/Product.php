<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
	* @return \Illuminate\Database\Eloquent\Relations\HasMany
	*/
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
