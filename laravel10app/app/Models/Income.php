<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['income_category_id', 'amount', 'date', 'description'];
    public function category()
    {
        return $this->belongsTo(IncomeCategory::class, 'income_category_id');
    }
    public function getFormattedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->date)->format('d F Y');
    }
}
