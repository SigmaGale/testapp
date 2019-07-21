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
     <h1>Create Post</h1><p id="counter" class="float-right">140</p>
     {!! Form::open(['action'=> 'PostsController@store','method' => 'POST'])!!}
             <div class="form-group">
                {{Form::textarea('body','',['class' => 'form-control','rows'=>'2','id'=>'postTextArea','oninput' => "textChange()",'placeholder' => 'Say something...', 'maxLength' => '140'])}}
             </div>
             {{Form::submit('Submit',['class' => 'btn btn-primary" float-right'])}}
     {!! Form::close()!!}
    <br><br>
    <h3>HOME</h3><hr>
    
    
    
        @if(count($posts)>0)
            @foreach($posts as $post)
            <div class="alert alert-secondary" style="height:100%" role="alert">
            <div class="dropdown float-right">
             @if($post->posted_by == auth()->user()->id)
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    </button>
                   
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <table>
                           <tr><td> <a class="dropdown-item" href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-primary btn-lg">Edit</button></a></tr></td>
                           <tr><td> <a class ="dropdown-item">
                            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('Delete',['class' =>'btn btn-danger'])}}
                            {!! Form::close()!!}
                            </a></tr></td>
                        </table>
                    </div>
                    @endif
                </div>
                <table>
                    <tr>
                        <td width="20%">
                        

                      
                        <img src="">
                         @if($post->user['image'] == null)
                            <img class="img-fluid" style="width:120px;height:auto; display:block ;margin-top:-auto" src="https://image.flaticon.com/icons/png/512/21/21294.png">
                         @else
                            <img class="img-fluid" style="width:120px;height:auto; display:block ;margin-top:-auto" src="/storage/profile_image/{{$post->user['image']}}">
                         @endif
                        
                            
                        </td>
                    
                        <td class="col-sm-9">
                         
                            <p><a href="/users/{{$post->posted_by}}">{{$post->user['name']}}</a> said "{{$post->body}}"</p>
                            <small>Quoted {{$post->created_at->diffForHumans()}}</small>
                        </td>   
                    </tr>
                </table>
               
            </div>

            @endforeach
            {{ $posts ->links('vendor.pagination/bootstrap-4') }}
        @else 
            <p> No posts available</p>
        @endif
    
@endsection

