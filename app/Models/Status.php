<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // Связь: один статус может быть у многих отчётов
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

     // Разрешённые для массового заполнения поля
     protected $fillable = ['name'];
}
