<?php

use App\Models\Author;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorIdToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignIdFor(Author::class)->nullable();
        });

        foreach (User::select('id')->get() as $user) {
            $author = Author::create([
                'user_id' => $user->id,
            ]);

            Post::where('user_id', $user->id)->update('author_id', $author->id);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->foreignIdFor(Author::class)->nullable(false)->change();
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('author_id');
            $table->foreignIdFor(User::class)->default(1);
        });
    }
}
