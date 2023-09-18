<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    public function album()
    {
      return  $this->belongsTo(Album::class,'album_id');
    }
    public function getImageUrlAttribute()
    {
        // if (!$this->image) {
        //     return "https://store.welloflifecenter.com/wp-content/uploads/2016/05/default_product-300x300.png";
        // }
        // if (Str::startsWith($this->image, ['https://', 'http://'])) {
        //     return $this->image;
        // }
        return asset('storage/' . $this->name);
    }

}
