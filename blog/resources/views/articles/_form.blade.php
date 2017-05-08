<div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'Slug') }}
        {{ Form::text('slug', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
            {{ Form::label('excerpt', 'Excerpt') }}
            {{ Form::textarea('excerpt', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Content') }}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Category') }}
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('tag', 'Tags') }}
        {{ Form::select('tag[]', $tags, null, ['class' => 'form-control', 'multiple' => true, 'id'=> 'tags']) }}
    </div>
    <div class="form-group">
        {{ Form::label('feature_image', 'Feature Image') }}
        {{ Form::file('feature_image', ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('published_at', 'Published At') }}
        {{ Form::text('published_at', null, ['class' => 'form-control']) }}
    </div>
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>