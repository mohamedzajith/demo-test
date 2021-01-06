<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $table="telephone";
    protected $fillable=[
        'id',
        'name',
        'number',
        'created_at',
        'updated_at'
    ];
}
