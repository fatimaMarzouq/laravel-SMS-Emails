<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class emailCustomer extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $table="email_customer";
    protected $fillable = ["id","email_id","customer_id"];

    public static function boot()
{
    parent::boot();
    
    static::creating(function ($model) {
        $model->id = Str::uuid();
    });
}

}
