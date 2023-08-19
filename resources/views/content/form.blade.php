@extends('master')

@section('title', 'Content Create')

@section('content')

    {{-- < lang="{{ str_replace('_','-',app()->getLocale()) }}"> --}}

    <body>

        <div class="container">
            <h1>Create Content</h1>
            <form action="{{ empty($contents->id)? url('/content') : url('/content/'.$contents->id)}}" method="POST">
                @if(!empty($contents->id))
                    @method('put')
                @endif
                @csrf
                <div class="mb-3">
                    <label for="topic">Topic</label>
                    <input type="text" class="form-control" id="topic" name="topic" value="{{ old('topic',$contents->topic) }}">

                    @error('topic')
                        <div class="invalid-feedback d-block">{{ $errors->first('topic') }}</div>
                    @enderror
                </div>
                <div class="mb3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description',$contents->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback d-block">{{ $errors->first('description') }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags',$contents->tags) }}">

                    @error('tags')
                        <div class="invalid-feedback d-block">{{ $errors->first('tags') }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="links">Link</label>
                    <input type="text" class="form-control" id="links" name="links" value="{{ old('links',$contents->links) }}">

                    @error('links')
                        <div class="invalid-feedback d-block">{{ $errors->first('links') }}</div>
                    @enderror
                </div>

                @if(@empty($content->id))
                    <div class = "mb-3">
                        <label for="status">status: </label>
                        <select name="status" id="status">
                            <option value="1">เเสดง</option>
                            <option value="0">ไม่เเสดง</option>
                        </select>
                    </div>
                    
                @endif



                <a href="{{ url('/content') }}"><button type="submit" class="btn btn-sm btn-primary">Save</button></a>
                <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger">Back</a>


            </form>

        </div>


        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
    </body>
