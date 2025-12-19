<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class House extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'image_url',
        'text',
        'motto',
        'castle',
        'detail_text'
    ];

     // Для soft delete даты
    protected $dates = ['deleted_at'];

    // Accessor: при чтении created_at, возвращать в формате дд.мм.гггг
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
    }

    // Accessor: при чтении updated_at, возвращать в формате дд.мм.гггг
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
    }

    public function setCreatedAtAttribute($value)
    {
        if ($value instanceof \DateTimeInterface) {
            $this->attributes['created_at'] = $value->format('Y-m-d H:i:s');
        } else {
            $this->attributes['created_at'] = Carbon::createFromFormat('d.m.Y H:i', $value)->toDateTimeString();
        }
    }

    public function setUpdatedAtAttribute($value)
    {
        if ($value instanceof \DateTimeInterface) {
            $this->attributes['updated_at'] = $value->format('Y-m-d H:i:s');
        } else {
            $this->attributes['updated_at'] = Carbon::createFromFormat('d.m.Y H:i', $value)->toDateTimeString();
        }
    }
}
