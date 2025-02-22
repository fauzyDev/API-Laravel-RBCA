<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'string'; // Ubah tipe primary key menjadi string
  
    protected $fillable = ['judul', 'penulis', 'tahun_terbit', 'deskripsi'];
  
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($book) {
            if (empty($book->id)) { 
                $book->id = (string) Str::uuid();
            }
        });
    }
}
