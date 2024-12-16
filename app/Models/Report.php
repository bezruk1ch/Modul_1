<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // Связь: каждый отчёт имеет один статус
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // Разрешённые для массового заполнения поля
    protected $fillable = [
        'number',
        'description',
        'status_id',
        'user_id',
    ];
}
