<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'email',
        'phone',
        'address',
    ];
    protected $fillable = ['member_code', 'name', 'phone', 'address'];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}