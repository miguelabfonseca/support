<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLocations extends Model
{
    use HasFactory;
    protected $fillable = ['description','customer_id','address','zipcode','district_id','county_id','manager_name','manager_contact','contact'];

}
