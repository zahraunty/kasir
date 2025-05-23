<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'stock',
        'price',
    ];

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}