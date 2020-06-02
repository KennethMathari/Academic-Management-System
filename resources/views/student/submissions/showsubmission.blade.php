@extends('layouts.app2')

    
@section('content')

<div class="container">
<div class="panel panel-default" style="margin-top: 10px;">
    <div class=" panel-heading" >
        <div class="row">
        <h3 style="text-align:center"><b>{{$submission->filename}}</b></h3>

        <div class="col-md-6 col-xs-6">
            <p ><b>Submitted on: </b>{{$submission->created_at->format('d-m-Y')}}</p>
        </div>
        <div class="col-md-6  col-xs-6">        
        <p  style="text-align:right"><a href="/assignment/submission/download/{{$submission->filename}}" class="btn btn-warning">Download</a></p>

      
        </div>
        </div>
    </div>
    <div class="row panel-body" style="margin:0px;">
        <p>{{$submission->comment}}</p>

        <iframe src="{{ asset('/Submissions/'.$submission->filename) }}" height="400" style=" width:100%" frameborder="0" class="col-xs-12" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        
        <p style="margin:10px;text-align:right"><b>Submitted by:</b>{{$submission->student_name}}</p>

    </div>
    <div class=" panel-footer">
        <div class="row">
        <div class="col-md-6 col-xs-6">
            <p ><label>Teacher remarks:</label>{{ $submission->teacher_remarks ?? 'Pending...'}}</p>
        </div>
        <div class="col-md-6 col-xs-6">
            @if (empty($submission->teacher_remarks))
            <p style="text-align: right"><a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Remarks</a></p>
 
            @else
            <p style="text-align: right"><a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit Remarks</a></p>

            @endif

            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">Teacher Remarks</h4>
        </div>
        <div class="modal-body">
                    <form method="POST" action="/assignment/submission/remarks/{{$submission->id}}">
                      @csrf
                      @method('PUT')
                        <div class="form-group">
                            <label for="teacher_remarks">{{ __('Remarks:') }}</label>
                            <textarea rows="8" cols="50" id="teacher_remarks" type="text" class="form-control @error('teacher_remarks') is-invalid @enderror" name="teacher_remarks" placeholder="Enter remarks" required>{{$submission->teacher_remarks}}</textarea>
                    
                                @error('teacher_remarks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                              <p style="text-align: center"><button type="submit" class="btn btn-primary" style="width:70%">
                                  {{ __('Submit') }}
                              </button></p>
                    </form>
                    
                  </div>
        </div>
      </div>
  
    </div>
  </div>
        </div>
        </div>

        
    </div>

  </div>
</div>


@endsection
