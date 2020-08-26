@extends('layouts.app')
    @section('content')
            <div class="container">
                <h1 class="text-center">
                    URL Shortener
                </h1>
                <form action="" method="post" class="form-inline align-content-center" style="margin: 0 auto">
                    <input type="url" name="url" id="" class="form-control mr-2">
                    <input type="submit" value="Shorten" class="btn btn-primary">
                    @csrf
                </form>
                @isset($code)
                    Your short URL is here! <div class="alert alert-success" role="alert"><a href="{{ $code ?? '' }}">{{ $code ?? '' }}</a></div>
                @endisset
                
            </div>
    @endsection
