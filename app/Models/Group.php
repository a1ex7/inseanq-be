<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasUuid;

    protected $fillable = [
        'number', 'course', 'faculty'
    ];

    /**
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('number', 'like', '%'.$value.'%')
            ->orWhere('course', $value)
            ->orWhere('faculty', 'like', '%'.$value.'%');
    }
}
