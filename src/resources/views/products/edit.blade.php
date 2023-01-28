@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('products.update', $product) }}" method="post">
  @method('patch')
  @include('products.form')
  <button type="submit">更新する</button>
  <a href="{{ route('products.index') }}">キャンセル</a>
</form>
@endsection