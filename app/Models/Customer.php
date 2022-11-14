<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "user_table";
    protected $primaryKey = "customer_id";
    protected $fillable    = ['name','email','dob','gender','password','address','Status'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function getDobAttribute($value)
    {
        return date("d-M-Y",strtotime($value));
    }
}
