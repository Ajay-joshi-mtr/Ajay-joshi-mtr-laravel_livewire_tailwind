@extends('layouts.app')

@section('content')
<x-savings.content>
    <x-slot name="card_body">
        <form method="post" action="{{ route('topics.updatedesc', $topic->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h1 class="text-md">Long Description : </h1>
            </div>
            <textarea name="description">{{ $topic->description }}</textarea>
            <div class="form-group text-left">
                <br><span>Save option is not available.</span>
                <a href="{{ route('topics.view', $topic->id) }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mr-4">Back</a>
                <!-- <button type="submit" class="flex-shrink-0 text-white bg-purple-500 border-0 py-2 px-3 focus:outline-none hover:bg-purple-600 rounded text-sm mt-2">Save</button> -->
            </div>
        </form>
    </x-slot>
</x-savings.content>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection

<div>
    @section('title')
    Edit Topic Description
    @endsection

    @section('content-header')

    <div class="flex flex-col sm:flex-row sm:items-center items-start mx-auto">
        <x-content-header>
           <span class="text-lg" > {{ $topic->title }} </span>
        </x-content-header>
        <a href="{{ route('topics.view', $topic->id) }}" class="float-left flex-shrink-0 text-white bg-purple-500 border-0 py-1 px-2 focus:outline-none hover:bg-purple-600 rounded text-sm lg:mt-10 mt-2 lg:mr-4">Back</a>
    </div>
    @endsection



</div>