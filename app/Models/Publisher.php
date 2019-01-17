<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Publisher
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Magazine[] $magazines
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Publisher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Publisher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Publisher query()
 * @mixin \Eloquent
 */
class Publisher extends Model
{
    public function magazines()
    {
        return $this->hasMany(Magazine::class);
    }
}
