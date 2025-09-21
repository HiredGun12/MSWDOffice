<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoloParentFamily extends Model
{
    use HasFactory;

    protected $table = 'solo_parent_family';

    protected $fillable = [
        'solo_parent_id',
        'name',
        'relationship',
        'age',
        'birthday',
        'civil_status',
        'occupation',
        'educational',
        'monthly',
    ];

    /**
     * Relationship: Each Family Member belongs to one Solo Parent
     */
    public function soloParent()
    {
        return $this->belongsTo(SoloParent::class, 'solo_parent_id');
    }
}
