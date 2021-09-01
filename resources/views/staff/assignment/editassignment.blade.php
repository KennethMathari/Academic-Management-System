@extends('layouts.app2')

    
@section('content')

<div class="container">

    <h3 class="well">EDIT ASSIGNMENT</h3>
<form method="post" action="/assignment/{{$assignment->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

  <div class="form-group">
    <label for="title">{{ __('Title:') }}</label>
  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$assignment->title}}" required>

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
      <label for="filename" class="custom-file-upload">{{ __('File:') }}</label>
          <input id="filename" type="file" name="filename" class=" @error('filename') is-invalid @enderror" value="{{$assignment->filename}}">
          @error('filename')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="form-group">
            <label for="description">{{ __('Description:') }}</label>
                {{-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$assignment->description}}" required autocomplete="description"  > --}}
                <textarea rows="8" cols="50" id='article-ckeditor' type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>{!!$assignment->description!!}</textarea>

    
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        <div class="form-group">
            <label for="class">{{ __('Class:') }}</label>
                <input id="class" type="number" class="form-control @error('class') is-invalid @enderror" name="class" value="{{$assignment->class}}" required autocomplete="class"  >
    
                @error('class')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="subject">{{ __('Subject:') }}</label>
                  <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{$assignment->subject}}" required autocomplete="subject"  >
      
                  @error('subject')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="form-group">
                <label for="duedate">{{ __('Due Date:') }}</label>
              <input id="duedate" type="datetime-local" class="form-control @error('duedate') is-invalid @enderror" name="duedate" value="{{$assignment->duedate}}" required  >
        
                    @error('duedate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>        
  </div>


<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>


@endsection
