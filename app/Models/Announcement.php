<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory, Searchable;


    protected $fillable = [
        'name', 'price', 'description', 'img', 'user_id', 'category_id',
    ];

    public function toSearchableArray(){
        $category = $this->category;
        $array = [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'category' => $category,
        ];

        return $array;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}