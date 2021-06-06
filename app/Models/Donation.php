<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation extends Model
{

    protected $table = 'donations';

    public function requests(){
        $this->hasMany(Request::class);
    }

    public function user_id(){
        $this.belongsTo(Models/User::class, 'user_id');
    }

    public function donated_to(){
        $this.belongsTo(Models/User::class, 'donated_to');
    }
}
