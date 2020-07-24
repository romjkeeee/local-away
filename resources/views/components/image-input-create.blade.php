<div class="form-group">
    <label for="exampleInputImage">Image</label>
    <div class="input-group">
        <div class="custom-file">
            {{ Form::label('image','Chose image',['class' => 'custom-file-label']) }}
            {{ Form::file('image') }}
        </div>
    </div>
</div>
