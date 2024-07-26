<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Petcategory;
class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'weight',
        'sex',
        'description',
        'pet_image',
        'adoption_status',
        'petcategory_id',
        'price',
    ];

    public $table = 'pet';
    public $incrementing = 'false';
    public $keyType = 'string';
       
    protected static function boot()
    {
        parent::boot();
       
         static::creating(function ($user){
            $uuid = str_replace('-', '', Str::uuid()->toString());
            $user->id = substr($uuid, 0, 10);
         });
      
    }

    public function category()
    {
        return $this->belongsTo(Petcategory::class, 'petcategory_id');
    }
 
}
