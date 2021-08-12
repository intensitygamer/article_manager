@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dashboard') }}" title="Go back">Back</i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> There were some problems with your input. </strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update.article') }}" method="POST">

        @csrf

        <div class="row" style="margin-left:20px; margin-right:20px;">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Article Title:</strong>
                    <input type="text" name="article_name" class="form-control" placeholder="Article Title" value = {{ isset( $article->article_name ) ?  $article->article_name : ''}} >
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Article Content:</strong>
                    <textarea name="article_description" class="form-control" cols = 10 row=50>{{ isset( $article->article_description ) ?  $article->article_description : ''}}
                    </textarea>
                </div>
            </div>

 
              <input name="id" type="hidden" value="{{  isset( $article->id ) ? $article->id : '' }}">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update Article</button>
            </div>
        </div>

    </form>
@endsection
