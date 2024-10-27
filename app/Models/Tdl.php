<?php

namespace App\Models;

use App\Exports\Tdls;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Supportr\Str;

class Tdl extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'identifier',
        'day',
        'goal',
        'time',
        'status',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function statuses()
    // {
    //     return $this->hasMany(Tdls::class);
    // }

    // public function makeTdls($string)
    // {
    //     $this->tdls()->create([
    //         'body' => $string,
    //         'identifier' => Str::slug(Str::random(32) . $this->id),
    //     ]);
    // }
}
