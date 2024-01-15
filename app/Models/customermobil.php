<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customermobil extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode';
    protected $table = 'customer_mobil';
    protected $fillable =['kode', 'id_customer', 'id_mobil'];

    
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
}
