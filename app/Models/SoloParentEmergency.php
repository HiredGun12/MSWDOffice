<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoloParentEmergency extends Model
{
    use HasFactory;

    protected $table = 'solo_parent_emergency';

    protected $fillable = [
        'solo_parent_id',
        'name',
        'relationship',
        'contact_no',
        'address',
    ];

    /**
     * Relationship: Each Emergency Contact belongs to one Solo Parent
     */
    public function soloParent()
    {
        return $this->belongsTo(SoloParent::class, 'solo_parent_id');
    }
}
