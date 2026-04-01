<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    static public function parse($tags)
    {
        return collect(explode(' ', $tags))
            ->filter(fn($tag) => str_starts_with($tag, '#') && strlen($tag) > 1)
            ->map(fn($tag) => ucwords(strtolower(ltrim($tag, '#'))))
            ->unique()
            ->values();
    }

    static public function stringify($tags)
    {
        return $tags->map(fn($tag) => '#' . strtolower($tag->name))->implode(' ');
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}
