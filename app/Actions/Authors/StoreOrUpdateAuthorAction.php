<?php

namespace App\Actions\Authors;

use App\Models\Author;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreOrUpdateAuthorAction
{
    public static function execute(array $data, Author $author = null): Author
    {
        $author = $author ?? new Author();
        $user = $author->user ?? new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->api_token = Str::random(80);
        $user->save();

        $author->about = $data['about'];
        $author->avatar = self::avatar($data['avatar']);
        $author->user_id = $user->id;
        $author->save();

        return $author;
    }

    private static function avatar(UploadedFile $avatar = null): string
    {
        if (null !== $avatar) {
            $mediaType = "data:{$avatar->getClientMimeType()};base64,";
            return  $mediaType . base64_encode($avatar->getContent());
        }

        return self::defaultAvatar();
    }

    private static function defaultAvatar(): string
    {
        return 'data:image/svg+xml;base64,' . base64_encode(Storage::get('stubs/default-author-avatar.svg'));
    }
}
