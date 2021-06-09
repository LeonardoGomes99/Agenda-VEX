<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = "contacts";


    public $timestamps = false;
    

    protected $fillable = [
        'id_main_user',
        'nome',
        'email',
        'end', 
        'tel',   
        'cel'   
    ];


}
