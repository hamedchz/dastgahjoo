<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const STATUS_FAILED = 0;
    const STATUS_SUCCESS = 2;
    const STATUS_PENDING = 1;

    protected $fillable = [
        'payment_id',
        'user_id',
        'paid',
        'status',
        'invoice_details',
        'transaction_id',
        'transaction_result',
        'transactionable_id',
        'transactionable_type',
    ];

    public function transactionable(){
        return $this->morphTo();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function setInvoiceDetailsAttribute($value)
    {
        $this->attributes['invoice_details'] = serialize($value);
    }
    public function getInvoiceDetailsAttribute()
    {
        return unserialize($this->attributes['invoice_details']);
    }
    
    public function getTransactionResultAttribute()
    {
        return unserialize($this->attributes['transaction_result']);
    }
    public function setTransactionResultAttribute($value)
    {
        $this->attributes['transaction_result'] = serialize($value);
    }
}
