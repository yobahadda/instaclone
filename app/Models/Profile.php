<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function followers(){

        return $this->belongsToMany(User::class);

    }

    public function profileImage(){

        $imagePath = ($this->image) ? $this->image : 'profile/QWGGoLbP8gwbxrp5Ko4eEy9YY4WJCtP9x7WYS0OU.jpg';
        return '/storage/'. $imagePath;
}

}
