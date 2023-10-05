<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemResponseFooter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'content', 'is_primary'
    ];

    /**
     * update attribute
     *
     * @param string $content
     * @return void
     */
    public function UpdateContent($content)
    {
        $this->content = $content;
        $this->save();
    }
}
