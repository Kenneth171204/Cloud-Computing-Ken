<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // 👇 TAMBAHKAN BAGIAN INI 👇
    protected $fillable = [
        'full_name',
        'student_email',
        'password',
        'birthdate',
    ];
}