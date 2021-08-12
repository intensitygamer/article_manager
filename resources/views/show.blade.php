@extends('layouts.app')


@section('content')

<style type="text/css">
    
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center">
                <h2>  </h2>
            </div>
            <div class="pull-center">
                <a class="btn btn-primary" href="{{ route('articles') }}" title="Go back"> Go back<i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Article Title:</strong>
                {{ isset( $article->article_name ) ?    
                    $article->article_name : ''}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Article Content:</strong>
                {{ isset( $article->article_description ) ?    
                    $article->article_description : ''}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Author ID:</strong>
                {{ isset( $article->author_id ) ? $article->author_id : '' }}   
            </div>
        </div>
       
    </div>
</div>
@endsection
