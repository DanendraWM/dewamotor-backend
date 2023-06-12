<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;

class sales extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $incrementing=false;
    protected $keyType='string';
    public function cabang()
    {
        return $this->belongsTo(cabang::class,'cabang_id');
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            if ($model->getKey()==null) {
                $model->setAttribute($model->getKeyName(),Str::uuid()->toString());
            }
        });
    }
}
