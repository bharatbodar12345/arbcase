<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbcase extends Model
{
    use HasFactory;
    protected $table = 'arbcase';
    protected $fillable = ['status'];
    protected $primaryKey = "id";

    public function arbuser1()  
{  
    //  dd(User::class, 'user1', 'id');
    return $this->belongsTo(User::class, 'user1', 'id');  

}
public function userid()  
{  
    //  dd(User::class, 'user', 'id');
    return $this->belongsTo(User::class, 'user', 'id');
    
}

public function arbcase_ext()  
{  
    //  dd(User::class, 'user', 'id');
    return $this->belongsTo(arbcase_ext::class, 'caseid', 'id');
    
}
public function closed_award()  
{  
    //  dd(User::class, 'user', 'id');
    return $this->belongsTo(closed_award::class, 'caseid', 'id');
    
}
public function arbcasetable()  
{  
    //  dd(User::class, 'user', 'id');
    return $this->belongsTo(arbcasetable::class, 'arbid', 'id');
    
}
public function arbitration_date()  
{  
    //  dd(User::class, 'user', 'id');
    return $this->belongsTo(arbitration_date::class, 'case_id', 'id');
    
}
public function user_involved_in_agreement_arb()  
{  
    //  dd(User::class, 'user', 'id');
    return $this->belongsTo(user_involved_in_agreement_arb::class, 'userId', 'id');
    
}

}
