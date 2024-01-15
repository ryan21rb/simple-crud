<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mobil';
    protected $table = 'mobil';
    protected $fillable =[ 'merek', 'warna', 'keterangan']; 
    public $incrementing = true; // Indicates whether the IDs are auto-incrementing

    protected $keyType = 'int'; // The type of the primary key

    public $timestamps = true;
    public function customerMobils()
    {
        return $this->belongsToMany(Customer::class, 'customer_mobil', 'id_mobil', 'id_customer');
    }
}
