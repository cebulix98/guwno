<?php

namespace App\Models\Motion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotionField extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'code', 'name_lang', 'type'
    ];
}
