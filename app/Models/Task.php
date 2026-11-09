<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;

class Task extends Model
{
    use HasFactory;

    // esconder estos campos, ya que son traidos con eloquent
    protected $hidden = [
        'user_id',
        'company_id'
    ];

    //datos aceptadors para create y update
    protected $fillable = [
        'name',
        'description',
        'is_complete',
        'user_id',
        'company_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
