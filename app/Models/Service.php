<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * Get the service type for the service.
     */
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

   /**
     * Change Date Format.
     *
     * @param  string  $value
     * @return date
     */
    public function getDateAttribute($value)
    {
        return date("F j, Y", strtotime($value));
    }

    /**
     * Make first letter capital
     *
     * @param  string  $value
     * @return string
     */

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }

 }

