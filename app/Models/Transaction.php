<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'date',
        'name',
        'description',
        'debit',
        'credit',
    ];

    public function getSaldo($startDate, $endDate)
    {
        if ($startDate && $endDate) {
            return $this->whereBetween('date', [$startDate, $endDate])->sum('debit') - $this->whereBetween('date', [$startDate, $endDate])->sum('credit');
        }

        return $this->sum('debit') - $this->sum('credit');
    }
}
