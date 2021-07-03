<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ["title", "body", "category_id", "price","is_accepted"];
    protected $with = ['category', 'images', 'user'];

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    /*public function getRouteKey()
    {
        return $this->slug;
    }*/

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

        return Announcement::where('is_accepted', null)->count();
    }


    static function getSlug($title) {

        $slug = Str::of($title)->slug("-");
        $c = Announcement::where("slug", "LIKE", "%{$slug}%")->count();

        return $slug->append($c? "-{$c}" : "");

        //return Str::of($title)->slug("-")->append($count > 1 ? "-" . $count : "");
    }
}
