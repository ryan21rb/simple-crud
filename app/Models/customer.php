<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_customer';
    protected $table = 'customer';
    protected $fillable =['id_customer', 'nama', 'email', 'alamat']; 
  
    public function customerMobils()
    {
        return $this->belongsToMany(Mobil::class, 'customer_mobil', 'id_customer', 'id_mobil');
    }

}
