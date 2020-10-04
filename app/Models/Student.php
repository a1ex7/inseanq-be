<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasUuid;

    protected $fillable = [
        'group_id', 'firstname', 'lastname', 'surname', 'birthday'
    ];

    protected $dates = [
        'birthday'
    ];

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function getFullNameAttribute()
    {
        return implode(' ', [
            $this->getAttribute('lastname'),
            $this->getAttribute('firstname'),
            $this->getAttribute('surname'),
        ]);
    }

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('firstname', 'like', '%'.$value.'%')
            ->orWhere('lastname','like', '%'.$value.'%')
            ->orWhere('surname', 'like', '%'.$value.'%')
            ->orWhereHas('group', function($query) use ($value) {
                return $query->where('number', $value);
            });
    }
}
