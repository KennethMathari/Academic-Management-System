@extends('layouts.app2')
@section('content')
 
    <div class="container">

        <h3 class="well">EDIT ASSIGNMENT</h3>
    <form method="post"action="../../submission/{{$submission->id}} " enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PUT')
        <div class="form-group">
          <label for="filename" class="custom-file-upload">{{ __('File:') }}</label>
        <input id="filename" type="file" name="filename" class=" @error('filename') is-invalid @enderror" value="{{$submission->filename}}">
              @error('filename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label for="comment">{{ __('Comment:') }}(Optional)</label>
                <textarea rows="8" cols="50" id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{!!$submission->comment!!}" >{!!$submission->comment!!}</textarea>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

    
            <p style="text-align:center"><button type="submit" class="btn btn-primary" style="margin-top:10px;width:70%">Submit</button></p>
    
      </form>        
      </div>



@endsection
