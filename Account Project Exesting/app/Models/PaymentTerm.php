<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\PaymentTermDetail;
class PaymentTerm extends Model
{
    use HasFactory;
    protected $fillable = ['name','description_on_invoice','user_id','status'];
    
    public function user()
    {
        return $this -> belongsTo(User :: class);
    }
    public function details()
    {
        return $this -> hasMany(PaymentTermDetail :: class,'payment_terms_id');
    }
}
