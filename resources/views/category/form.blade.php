<div class="form-group">
    <input type="text" class="form-control" name="title" value="{{ $category->title ?? '' }}" placeholder="Name categories">
</div>
<div class="form-group">
    <select name="parent_id" class="form-control">
        <option value="0">-- no parents --</option>
        @include('category.categories')
    </select>
</div>
<hr>
<button type="submit" class="btn btn-primary">Save</button>