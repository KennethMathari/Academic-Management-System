@extends('layouts.app2')

    
@section('content')
 
    <div class="container">

        <h3 class="well">ADD ASSIGNMENT</h3>
    <form method="post"action="{{ route('assignment.store') }}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-group">
        <label for="title">{{ __('Title:') }}</label>
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required >

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
          <label for="filename" class="custom-file-upload">{{ __('Filename:') }}</label>
              <input id="filename" type="file" accept="application/pdf" name="filename" class=" @error('filename') is-invalid @enderror">
              @error('filename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group">
                <label for="description">{{ __('Description:') }}</label>
                <textarea rows="8" cols="50" id='article-ckeditor' type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required></textarea>
        
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            <div class="form-group">
                <label for="class">{{ __('Class:') }}</label>
                    {{-- <input id="class" type="number" class="form-control @error('class') is-invalid @enderror" name="class" required  > --}}

                    <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required>
                        <option value=""></option>
                        <option value="8">8</option>
                        <option value="7">7</option>
                        <option value="6">6</option>
                        <option value="5">5</option>
                        <option value="3">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                        <option value="PP2">PP2</option>
                        <option value="PP1">PP1</option>

                      </select>

                      @error('class')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="subject">{{ __('Subject:') }}</label>
                      <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" required >
          
                      @error('subject')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="duedate">{{ __('Due Date:') }}</label>
                  <input id="duedate" type="datetime-local" class="form-control @error('duedate') is-invalid @enderror" name="duedate" required >
            
                        @error('duedate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                  <div class="form-group">
                  <input id="teacherid" type="hidden" class="form-control @error('teacherid') is-invalid @enderror" name="teacherid" value="{{Auth::user()->Adm_No}}" required autocomplete="teacherid" >
            
                        @error('teacherid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                  <div class="form-group">
                  <input id="teacher" type="hidden" class="form-control @error('teacher') is-invalid @enderror" name="teacher" value="{{Auth::user()->name}}" required autocomplete="teacher"  >
            
                        @error('teacher')
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
