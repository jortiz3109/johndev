@csrf
<b-field label="{{ trans('authors.name') }}"
         type="{{ $errors->has('name') ? 'is-danger' : '' }}"
         message="{{ $errors->has('name') ? $errors->first('name') : '' }}">
    <b-input type="text" name="name" value="{{ old('name') ?? $author->name }}" required></b-input>
</b-field>

<b-field label="{{ trans('authors.email') }}"
         type="{{ $errors->has('email') ? 'is-danger' : '' }}"
         message="{{ $errors->has('email') ? $errors->first('email') : '' }}">
    <b-input type="text" name="email" value="{{ old('email') ?? $author->email }}" required></b-input>
</b-field>

<b-field label="{{ trans('authors.password') }}"
         type="{{ $errors->has('password') ? 'is-danger' : '' }}"
         message="{{ $errors->has('password') ? $errors->first('password') : '' }}">
    <b-input type="password" name="password" required></b-input>
</b-field>

<b-field label="{{ trans('authors.password_confirmation') }}"
         type="{{ $errors->has('password') ? 'is-danger' : '' }}"
         message="{{ $errors->has('password') ? $errors->first('password') : '' }}">
    <b-input type="password" name="password_confirmation" required></b-input>
</b-field>

<b-field label="{{ trans('authors.avatar') }}"
         type="{{ $errors->has('avatar') ? 'is-danger' : '' }}"
         message="{{ $errors->has('avatar') ? $errors->first('avatar') : '' }}">
    <upload name="avatar" label="@lang('authors.upload_avatar')"></upload>
</b-field>

<b-field label="{{ trans('authors.about') }}"
         type="{{ $errors->has('about') ? 'is-danger' : '' }}"
         message="{{ $errors->has('about') ? $errors->first('about') : '' }}">
    <b-input type="textarea" name="about" minlength="10" maxlength="500" value="{{ old('about') ?? $author->about }}" required></b-input>
</b-field>

<save-button form="authorForm">
    {{ $texts['save'] }}
</save-button>
