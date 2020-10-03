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

    protected $casts = [
        'birthday' => 'date',
    ];

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
