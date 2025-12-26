<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class House extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'image_url',
        'text',
        'motto',
        'castle',
        'detail_text',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
{
    static::deleting(function ($house) {
        if (
            auth()->check() &&
            auth()->id() !== $house->user_id &&
            !auth()->user()->is_admin
        ) {
            abort(403, 'Удаление запрещено');
        }
        });
    }




     // Для soft delete даты
    // protected $dates = ['deleted_at'];

     protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


}
