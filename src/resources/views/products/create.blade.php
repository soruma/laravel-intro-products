@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('products.store') }}" method="post">
  @include('products.form')
  <button type="submit">登録する</button>
  <a href="{{ route('products.index') }}">キャンセル</a>
</form>
@endsection