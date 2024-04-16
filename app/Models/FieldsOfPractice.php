<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldsOfPractice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function fieldsOfPractice()
    {
        return $this->belongsToMany(FieldsOfPractice::class, 'practice_fields_of_practice');
    }
}
