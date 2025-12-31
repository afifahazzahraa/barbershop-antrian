<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $fillable = ['customer_name', 'service_id', 'queue_number', 'status'];

    public function service() {
        return $this->belongsTo(Service::class)->withDefault([
            'name' => 'Layanan Tidak Tersedia',
            'price' => 0
        ]);
    }
}