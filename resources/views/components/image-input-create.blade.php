<div class="form-group">
    <label for="exampleInputImage">Image</label>
    <div class="input-group">
        <div class="custom-file">
            {{ Form::label('image','Chose image',['class' => 'custom-file-label']) }}
            {{ Form::file('image') }}
        </div>
    </div>
</div>
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.3.4/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () { bsCustomFileInput.init(); });
    </script>
@stop
