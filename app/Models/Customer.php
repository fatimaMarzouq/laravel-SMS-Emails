<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable =['name','email','phone','position','company','send_sms','send_email1','send_email2','send_email3','sms_sent','email1_sent','email2_sent','email2_sent','link_clicked'];

    public function emails(){
        return $this->belongsToMany('App\Models\PredefinedEmails');
    }
}
