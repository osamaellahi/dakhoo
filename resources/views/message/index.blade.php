
<script>
	var chk=0;
	</script>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	#body{
		height: 100%;
		background-image: url("https://us.123rf.com/450wm/alchemic2015/alchemic20151906/alchemic2015190600966/124218166-chat-theme-holiday-background-crowd-composed-of-funny-smileys-.jpg?ver=6");
	}
	#me #server-results{
		padding:20px;
		background-image: url("https://blog.1a23.com/wp-content/uploads/sites/2/2020/02/Desktop.png");
		color:#ccc;
	}
		@media screen and (max-width: 600px) {
						#heal{
							font-size:8px;
						}
				}
	#heal{
				font-size:20px;
		}
	#me{
		background:rgb(247, 241, 227);
		padding:12px;
		margin:1% 5% 0% 5%;
		border-top:1px solid green;
		border-left:1px solid green;
		border-right:1px solid green;
		overflow-y:scroll;
		
	}
	/* width */
	::-webkit-scrollbar {
	  width: 10px;
	}
	
	/* Track */
	::-webkit-scrollbar-track {
	  background: #f1f1f1; 
	}
	 
	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #8118; 
	}
	
	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background:black; 
	}
	#name
	{
		padding-left:10%;
		padding-right:10%;
		padding-top:5px;
	}
	#name p{
		
		display:inline-block;
	}
	#name input{
		width:37%;
		display:inline-block;
		border:1px solid aqua;
		border-radius:5px;
		height:35px;
		font-size:20px;
	}
	#na{
		display:none;
	}
	#msg-box
	{
		margin:05px 5% 5% 5%;
	}
	
	#mySidenav a {
	  position: absolute;
	  left: -80px;
	  transition: 0.3s;
	  padding: 15px;
	  width: 130px;
	  text-decoration: none;
	  font-size: 20px;
	  color: white;
	  border-radius: 0 5px 5px 0;
	}
	
	#mySidenav a:hover {
	  left: 0;
	}
	
	#about {
	  top: 20px;
	  background-color: #4CAF50;
	}
	
	</style>
	</head>   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<div id="body">
<h2 style="text-align:center;">Chat anonymously</h2>
<div id="mySidenav" class="sidenav" >
	<a href="/about" id="about">About</a>
  </div>
<div id="me" style="height:75%;border-radius:10px;padding:0px;">
	<div id="server-results" >
	<?php
		$data=App\mess::orderBy('id', 'asc')->get();
			?>	
	@foreach ($data as $d)
	<hr><h4 style="color:#fcfcfc">{{$d->name}}<small style="float:right">{{$d->created_at}}</small></h4><p>{{$d->body}}<</p>
	@endforeach
	
	</div></div>
	<div id="upload-progress" style=" height: 2px;border: 1px solid #ddd;width: 100%;margin:1px;">
	
		<div class="progress-bar"
		style="background: darkorchid;    width: 0;    height: 2px;"></div></div> <!-- Progress bar added -->
<div class="" style="background:#;padding-left:5%;padding-right:5%;color:#fff;">
{!! Form::open(['action' => 'MessageController@store','method'=> 'POST','id'=>'my_form']) !!}
{{ csrf_field() }}
<div class="form-group">
<div class="input-group" style="background:#fff;padding:5px;border-radius:10px;margin-bottom:1px;">
{{Form::text('name', 'Bot',[ 'required','class'=>'form-control','style'=>'margin-left:20px;display:inline-block;width:55%','placeholder'=>'Enter name here...'])}}
  <div class="input-group-btn" style="background:inherit;color:;">
        <button class="btn btn-default" type="button" style="text-color:white;">name</button>
      </div>
    </div>
	 <div class="input-group" style="background:#fff;padding:2px;border-radius:10px;">
	 {{Form::text('msg', '',['class'=>'form-control','id'=>'msg','style'=>'width:55%;display:inline-block;','placeholder'=>'Enter message here...'])}}
 <div class="input-group-btn" style="background:inherit;color:;">
        <button class="btn btn-default" type="button" style="text-color:white;">message</button>
      </div>
	  
{{Form::file('image',['class'=>'btn btn-primary'])}}

  {{Form::submit('send',['class'=>'input-group-text btn btn-danger','style'=>'display:inline-block;float:right','id'=>'basic-addon2'])}}
	
</div>
{!! Form::close() !!}
</div>
</div>

<script>

data();
$("#my_form").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = new FormData(this); //Encode form elements for submission
    
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
		contentType: false,
		processData:false,
		xhr: function(){
		//upload Progress
		var xhr = $.ajaxSettings.xhr();
		if (xhr.upload) {
			xhr.upload.addEventListener('progress', function(event) {
				var percent = 0;
				var position = event.loaded || event.position;
				var total = event.total;
				if (event.lengthComputable) {
					percent = Math.ceil(position / total * 100);
				}
				//update progressbar
				$("#upload-progress .progress-bar").css("width", + percent +"%");
			}, true);
		}
		return xhr;
	}
    }).done(function(response){ //
       // $("#server-results").html(response);
	   
	   $("#upload-progress .progress-bar").css("width","0%");
	   render(response);

    });
});

var output =document.getElementById('server-results');
var content;
var chk="";

function render(response)
{
	chk++;
	var len =response.length;
	for(var i=0;i<len;i++)
	{
		var image="";
		chk++;
		if(response[i].file=="nofile")
		{
			image=" ";
		}
		else
		{
			image='<br><div class="row"><a href="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" download><img src="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" alt="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" style="max-width:40%;min-width:0px"></a></div>';
		}
		content+= '<hr><h4 id="downhere'+chk+'" style="color:#fcfcfc">'+response[i].name+'<small style="float:right">'+response[i].created_at+'</small></h4><p>'+response[i].body+image+'</p>';
	}
	output.innerHTML="";
	content=" ";
	$('#server-results').empty();
        output.insertAdjacentHTML('beforeend',content);
		$('#msg').val("");
		elmnt =document.getElementById("downhere"+chk);
 		elmnt.scrollIntoView();
}

data();

  window.setInterval(function(){
    data();
}, 10000);

function data(){
    $.get("/message/alldata", function(response){
      renderall(response);
    });
}
function renderall(response)
{

	content=" ";
	chk++;
	var len =response.length;
	for(var i=0;i<len;i++)
	{
		var image="";
		chk++;
		if(response[i].file=="nofile")
		{
			image=" ";
		}
		else
		{
			image='<br><div class="row"><a href="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" download><img src="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" alt="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" style="max-width:40%;min-width:0px"></a></div>';
		}
		content+= '<hr><h4 id="downhere'+chk+'" style="color:#fcfcfc">'+response[i].name+'<small style="float:right">'+response[i].created_at+'</small></h4><p>'+response[i].body+image+'</p>';
	}
	output.innerHTML="";
	$('#server-results').empty();
        output.insertAdjacentHTML('beforeend',content);
		$('#msg').val("");
}
function render1(response)
{
	chk++;
	var i=response.length;
	
	var image="";
		chk++;
		if(response.file=="nofile")
		{
			image=" ";
		}
		else
		{
			image='<br><div class="row"><a href="{{ URL::to("/") }}/storage/messages/'+response.file+'" download><img src="{{ URL::to("/") }}/storage/messages/'+response.file+'" alt="{{ URL::to("/") }}/storage/messages/'+response[i].file+'" width="230px;"></a></div>';
		}
		content+= '<hr><h4 id="downhere'+chk+'" style="color:#fcfcfc">'+response.name+'<small style="float:right">'+response.created_at+'</small></h4><p>'+response.body+image+'</p>';
	 //output.innerHTML="";
        output.insertAdjacentHTML('beforeend',content);
	
		//output.value=content;
		//console.log(content);
		elmnt =document.getElementById("downhere"+chk);
  elmnt.scrollIntoView();

}
	

</script>