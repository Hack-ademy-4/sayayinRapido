<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\AnnouncementImage;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ["title", "body", "category_id", "price","is_accepted"];
    protected $with = ['category', 'images'];

    public function toSearchableArray() {
        $array = [
            "id" => $this->id,
            "title" => $this->title,
            "body" => $this->body,
            "category" => $this->category->name,
            "other" => "announcement anuncio"
        ];

        return $array;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
        //return $this->with("category")->get();
    }

    public function images() {
        return $this->hasMany(AnnouncementImage::class);
    }

    public function firstImg() {
        if ($this->images->count())
            return $this->images->first()->getUrl(300, 150);
        return "/img/img-placeholder.png";
    }

    static public function ToBeRevisionedCount(){

        return Announcement::where('is_accepted',null)->count();
    }
}
