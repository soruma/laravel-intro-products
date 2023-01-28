@csrf 
<dl class="form-list">
    <dt>カテゴリ</dt>
    <dd>
      <select name="category_id">
        @foreach ($categoris as $category)
          <option value="{{ $category->id }}" @selected(old('category_id') == $category_id)>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </dd>
    <dt>メーカー</dt>
    <dd><input type="text" name="maker" value={{ old('maker', $product->maker) }}></dd>
    <dt>商品名</dt>
    <dd><input type="text" name="name" value={{ old('name', $product->name) }}></dd>
    <dt>価格</dt>
    <dd><input type="number" name="price" value={{ old('price', $product->price) }}></dd>
</dl>