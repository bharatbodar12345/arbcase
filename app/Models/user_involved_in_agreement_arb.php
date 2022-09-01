<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_involved_in_agreement_arb extends Model
{

    use HasFactory;
    
    protected $table = 'user_involved_in_agreement_arb';
    protected $primaryKey = "id";
}
