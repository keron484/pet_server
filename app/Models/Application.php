<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
class Application extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'pet_id',
       'fullname',
       'email',
       'address',
       'city',
       'state',
       'reason',
       'phone_number',
       'address',
       'num_pets',
       'num_kids',
       'payment_method',
       'status'
    ];

    public $incrementing = 'false';
    public $keyType = 'string';
    public $table = 'application';

    protected static function boot()
    {
        parent::boot();
       
         static::creating(function ($user){
            $uuid = str_replace('-', '', Str::uuid()->toString());
            $user->id = substr($uuid, 0, 10);
         });
      
    }
  
    public function user():  BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function pet(): BelongsTo {
        return $this->belongsTo(Pet::class);
    }
}
