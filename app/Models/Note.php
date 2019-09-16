<?php

namespace Notes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid as UuidPackage;

class Note extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'content'];

    /**
     * @param $query
     * @param $uuid
     *
     * @return mixed
     */
    public function scopeUuid($query, $uuid)
    {
        return $query->where($this->uuid, $uuid);
    }


    /**
     * Adding uuid for each note during creation
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = UuidPackage::uuid4()->toString();
        });
    }

}
