<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToAnnouncements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table('announcements', function (Blueprint $table) {
                $table->string("slug")->unique()->nullable()->after("title");
            });

            $as = Announcement::all();

            foreach($as as $a)
            {
                $a->slug = Announcement::getSlug($a->title);
                $a->save();
            }

        } catch (Exception $e) {
            /*Schema::table('announcements', function (Blueprint $table) {
                $table->dropColumn('slug');
            });*/
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('announcements', 'slug')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
}
