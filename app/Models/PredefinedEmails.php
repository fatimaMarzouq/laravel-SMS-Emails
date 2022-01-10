<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredefinedEmails extends Model
{
    use HasFactory;
    protected $table = 'predefined_emails';
    protected $fillable =['subject','message'];

    public function emails(){
        return $this->belongsToMany('App\Models\Customer');
    }
}
