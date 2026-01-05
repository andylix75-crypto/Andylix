<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competences extends Model
{
    use  HasFactory;

    protected $fillable = ['competence'];

    function artisans(): BelongsToMany
    {
        return $this->belongsToMany(Artisan::class);
    }
}
