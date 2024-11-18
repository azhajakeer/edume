<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BundleCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'bundle_id',
        'category',
        'category_image',
    ];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }
}
