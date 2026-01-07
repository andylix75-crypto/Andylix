<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artisan extends Model
{
    use  HasFactory;

    protected $fillable = [
        'user_id',
        'mantra',
        'is_available',
        'latitude',
        'longitude',
        'is_work_urgent',
        'is_work_week_end',
        'is_work_feries'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function competences(): BelongsToMany
    {
        return $this->belongsToMany(Competences::class);
    }
    function metiers(): BelongsToMany
    {
        return $this->belongsToMany(Metier::class);
    }
}
