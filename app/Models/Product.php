<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [ 'category_id','price','name' ,'photo'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // protected $appends = [
    //     'photo_url',
    // ];

    // public function getPhotoUrlAttribute()
    // {
    //     if ($this->photo && Storage::disk('photos')->exists($this->photo)) {
    //         return Storage::disk('photos')->url($this->photo);
    //     }

    //     return asset('noimage.png');
    // }


}
