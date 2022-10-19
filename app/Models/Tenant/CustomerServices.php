<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerServices extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'service_id', 'location_id', 'start_date', 'end_date', 'type', 'last_date'];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

}
