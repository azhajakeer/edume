<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'bundle_name',
        'description',
        'price',
        'bundle_image',
        'approval_status',  // Add this line to make sure approval_status is fillable
    ];

    public function categories()
    {
        return $this->hasMany(BundleCategory::class);
    }
}

