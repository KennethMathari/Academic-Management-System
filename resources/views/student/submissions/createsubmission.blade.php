@extends('layouts.app2')

    
@section('content')
 
    <div class="container">

        <h3 class="well">SUBMIT ASSIGNMENT</h3>
    <form method="post"action="{{ route('submission.store') }}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-group">
      <input id="assignment_id" type="hidden" class="form-control @error('assignment_id') is-invalid @enderror" value="{{$assignment->id}}" name="assignment_id" required >

            @error('assignment_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
          <label for="filename" class="custom-file-upload">{{ __('Filename:') }}</label>
              <input id="filename" type="file" accept="application/pdf" name="filename" class=" @error('filename') is-invalid @enderror" required>
              @error('filename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label for="comment">{{ __('Comment:') }}(Optional)</label>
                <textarea rows="8" cols="50" id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" ></textarea>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

           

                <div class="form-group">
                <input id="student_id" type="hidden" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{Auth::user()->Adm_No}}" required >
          
                      @error('student_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                 

                  <div class="form-group">
                  <input id="student_name" type="hidden" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{Auth::user()->name}}" required >
            
                        @error('student_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

    
            <p style="text-align:center"><button type="submit" class="btn btn-primary" style="margin-top:10px;width:70%">Submit</button></p>
    
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
