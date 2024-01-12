<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mobil';
    protected $table = 'mobil';
    protected $fillable =['id_mobil', 'merek', 'warna', 'keterangan']; 
    public $incrementing = false;
    protected $keyType = 'integer';
 
    public function customerMobils()
    {
        return $this->belongsToMany(Customer::class, 'customer_mobil', 'id_mobil', 'id_customer');
    }
}
