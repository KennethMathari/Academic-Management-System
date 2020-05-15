<h4><i class="glyphicon glyphicon-picture"></i> Display Data Image    </h4>
   <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Picture</th>
        <th>Description</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Teacher</th>

    </tr>
    </thead>
    <tbody>
        @foreach($records as $image)
       <tr>
           <td>{{$image->id}}</td>
           <td>{{$image->title}}</td>
           <td> <?php foreach (json_decode($image->filename)as $picture) { ?>
                 <img src="{{ asset('/Assignments/'.$picture) }}" style="height:120px; width:200px"/>
                <?php } ?>
           </td>
           <td>{{$image->description}}</td>
           <td>{{$image->class}}</td>
           <td>{{$image->subject}}</td>
           <td>{{$image->teacher}}</td>

      </tr>
        @endforeach
    </tbody>
   </table>