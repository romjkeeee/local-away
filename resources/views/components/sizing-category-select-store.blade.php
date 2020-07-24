<div class="form-group">
    <label for="inputForSizingCategory">Sizing Category</label>
    <p><select class="form-control" name="sizing_category_id">
            <option selected disabled>Chose sizing category</option>
            @foreach($sizing_category as $key => $cat)
                <option value="{{ $key }}">{{ $cat }}</option>
            @endforeach
        </select></p>
</div>
