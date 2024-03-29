<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

class CustomerBankAccounts extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','bank_id','account_number'];

    public function bankinfo()
    {
        return $this -> belongsTo(Bank :: class,'bank_id');
    }
}
