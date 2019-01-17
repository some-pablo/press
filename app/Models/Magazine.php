<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Magazine
 *
 * @property-read \App\Models\Publisher $publisher
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Magazine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Magazine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Magazine query()
 * @mixin \Eloquent
 */
class Magazine extends Model
{

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
