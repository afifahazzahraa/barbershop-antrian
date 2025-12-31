<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'service_id', 'queue_number', 'status'];

    public function service() {
        // withDefault akan mencegah error "property of non-object" di Blade
        return $this->belongsTo(Service::class)->withDefault([
            'name' => 'Layanan Tidak Tersedia',
            'price' => 0
        ]);
    }
}