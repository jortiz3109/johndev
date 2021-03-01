@csrf
<b-switch :rounded="false" name="published" value="{{old('published') ?? $post->isPublished() ? 'true' : 'false'}}" :native-value="true">
    {{ trans('posts.published') }}
</b-switch>
<b-switch :rounded="false" name="featured" value="{{ old('featured') ?? $post->isFeatured() ? 'true' : 'false'}}" :native-value="true">
    {{ trans('posts.featured') }}
</b-switch>

<b-field label="{{ trans('posts.title') }}"
         type="{{ $errors->has('title') ? 'is-danger' : '' }}"
         message="{{ $errors->has('title') ? $errors->first('title') : '' }}">
    <b-input type="text" name="title" value="{{ old('title') ?? $post->title }}" required></b-input>
</b-field>

<b-field label="{{ trans('posts.summary') }}"
         type="{{ $errors->has('summary') ? 'is-danger' : '' }}"
         message="{{ $errors->has('summary') ? $errors->first('summary') : '' }}">
    <b-input type="textarea" name="summary" minlength="10" maxlength="100" value="{{ old('summary') ?? $post->summary }}" required></b-input>
</b-field>

<b-field label="{{ trans('posts.body') }}"
         type="{{ $errors->has('body') ? 'is-danger' : '' }}"
         message="{{ $errors->has('body') ? $errors->first('body') : '' }}">
    <editor name="body" value="{{ old('body') ?? $post->body }}" required></editor>
</b-field>
<save-button form="postForm">
    {{ $texts['save'] }}
</save-button>
