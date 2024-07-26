<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Email extends Model
{
    use HasFactory;

    public $table = "email";
    public $incrementing = false;
    public $keyType = 'string';

    protected $fillable = [
        'title',
        'email',
        'text',
        'n'
    ];

    protected static function boot()
    {
        parent::boot();
       
         static::creating(function ($user){
            $uuid = str_replace('-', '', Str::uuid()->toString());
            $user->id = substr($uuid, 0, 15);
         });
      
    }
}
