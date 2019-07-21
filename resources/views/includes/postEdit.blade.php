    @extends('template.layout')
    @section('content')
    <script>
        var total;
        function textChange(value){
            const maxLength = 140;
          var x = document.getElementById("postTextArea").value;
            document.getElementById("counter").innerHTML =  maxLength -  x.length;
        }
    </script>
     <h1>Update Post</h1><p id="counter" class="float-right">140</p>

     {!! Form::open(['action' => ['PostsController@update',$post->id],'method' => 'PUT'])!!}
     
             <div class="form-group">
                {{Form::textarea('body',$post->body,['class' => 'form-control','rows'=>'2','id'=>'postTextArea','oninput' => "textChange()",'placeholder' => 'Say something...', 'maxLength' => '140'])}}
             </div>
               {{Form::hidden('_method','PUT')}}
             {{Form::submit('Submit',['class' => 'btn btn-primary" float-right'])}}
     {!! Form::close()!!}
     @endsection
    
