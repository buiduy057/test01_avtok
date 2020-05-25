
<!DOCTYPE html>
<html>
<head
>
	<meta charset='UTF-8'><meta name="robots" content="noindex">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js">
	<script src="https://use.typekit.net/hoy3lrg.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<!-- <script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
	<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
	<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script> -->
</head>
<body>
	<!------ Include the above in yourAD tag ---------->
	
	<div id="frame">
		<div id="sidepanel">
			<div id="profile">
				<div class="wrap">
					<img id="profile-img" src="http://emilcarlsson.se/assets/mikeross.png" class="online" alt="" />
					
					<p>Mike Ross</p>
					<div id="status-options">
						<ul>
							<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
							<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
							<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
							<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
						</ul>
					</div>
					
				</div>
			</div>
			<form method="GET" id="form_search_phone">
				<div id="search">
					<button type="submit" class="left-search" for="" id="btn-search-phone"><i class="fa fa-search" aria-hidden="true"></i></button>
					<input type="text" required="" id="search-phone" placeholder="{{ __('search') }}" />
					<a href="javascript:void(0)" class ="search-phone-close"><i class="fa fa-times" aria-hidden="true"></i></a>
				</div>
			</form>
			<div id="contacts">
				<ul>
				@foreach($sms as $s)
					<li class="contact" data-id="phone-{{$s['phone_number']}}"  >
						<div class="wrap" >
							<span class="contact-status online"></span>
							<img style="width: 50px" src="https://via.placeholder.com/40x40" alt="">
							<div class="meta btn-click" id="{{$s['id']}}" data-id="{{$s['id']}}"  data-from-phone-number = "{{$s['from_phone_number']}}">
								<p class="name" data-phone-number="{{$s['phone_number']}}">{{$s['phone_number']}}</p>
								<p class="preview" data-text="{{$s['text']}}">{{$s['text']}}</p>
							</div>
						</div>
					</li>
				@endforeach
				</ul>
			</div>
			<div id="bottom-bar">
				<button type="button"  class='btn'  ><i class="fa fa-comments-o" aria-hidden="true"></i><span>{{ __('chat') }}</span></button>
			</div>
	     <!-- Model -->
	 		<form method="GET" id="form_send_phone">
				<div  class="modal">
				  <div class="modal-content">
				    <span class="close">&times;</span>

				     <div class="form-group">
				     	<label>{{ __('to') }}</label>
				     	 <input type="text"  id="phone_number" required="" placeholder="{{ __('Write phone number...') }}" class="form-control"  name="phone_number">
				     </div>
				    <div class="form-group">
				     <label>{{ __('from') }}</label> <br>
				   	 <textarea type="text" name="text" id="text" required="" rows="9" class="form-control" placeholder="{{ __('Write your message...') }}" ></textarea>
					</div>
					<button id="id-chat" type="submit" class="btn btn-success" >{{ __('send') }}</button>
				  </div>
				</div>
			</form>
	 	<!-- end Model -->
		</div>
		 
		<div class="content">
			<div class="contact-profile">
				<img style="width: 42px" src="https://via.placeholder.com/40x40" alt="">
				<p >{{ __('phone') }}<span id="phone-id"></span></p>
				<input type="hidden" id="phone_number_01" name="phone_number" value="">
				<input type="hidden" id="from_phone_number_01" name="" value="">
				<form method="GET" id="form_search">
					<div id="search" class="">
						<input type="text" id="search-chat" required=""  name="search"  placeholder="{{ __('search') }}" />
						<button type="submit" class="search" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
						<a href="javascript:void(0)" class ="search-close"><i class="fa fa-times" aria-hidden="true"></i></a>

					</div>
				</form>
			</div>
			<div class="messages">
				<ul class="">
			       
					
				</ul>

			</div>
			<div class="message-input">
				<div class="wrap">
					<input type="text" name="text" id="text_01"  placeholder="{{ __('Write your message...') }}" />
					<button class="submit" id="id-chat-1" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
				</div>
			</div>
		
		</div>

	</div>
	<div class="menu">
		<ul>
			<li><a href="{!! route('user.change-language', ['en']) !!}"><img src="img/en.png" style="width: 30px;"></a></li>
			<li><a href="{!! route('user.change-language', ['vi']) !!}"><img src="img/vi.png" style=" width: 30px"></a></li>
		</ul>
	</div>
	<!-- <h1>{{ __('Welcome to my website!') }}</h1>	 -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript">
	  	 var page = 1;
	  	 var data_phone_number = "";
		
	    $('#form_search_phone').submit(function(e) {
	   		 e.preventDefault();
	   		 var search = $('#search-phone').val();
	   		 $(' .search-phone-close').addClass('block-close');
	   		 if(search ==''){
	   		 	$(' .search-phone-close').removeClass('block-close');
	   		 }
	   		 $.ajax({
			    url: "{{url('search-phone')}}/" + search,
			    type: 'GET',
			    error: function() {
			      alert("lỗi");
			    },
			     success: function(data) {
			     	// console.log(data);
			     	$("#contacts ul").empty();
			     	$("#contacts ul").append(data); 
			     }
		  	});	
		});
		$('.search-phone-close').click(function(){
		  		location.reload();
		  		$(' .search-phone-close').removeClass('block-close');
		});
		  // search 
		$('#form_search').submit(function(e) {
		    e.preventDefault();
			var search = $('#search-chat').val();
		    var phone_number = $('#phone_number_01').val();
			$('#search a i').addClass('block-a');
			if(search ==''){
	   		 	$(' .search-phone-close').removeClass('block-close');
	   		}
			 $.ajax({
			    url: "{{url('search-chat')}}/" + search,
			    type: 'GET',
			    data: {
			    	phone_number : phone_number
			    },
			    error: function() {
			      alert("lỗi");
			    },
			     success: function(data) {
			     	
			     	$(".messages ul").html('');
			     	$(".messages ul").append(data); 
			     }
			});	
		 });
	    $('.search-close').click(function() {

			var data_id = $('.btn-click.active').attr('data-id');
			var data_from_phone_number =  $('.btn-click.active').attr('data-from-phone-number');
			var data_phone_number=  $('.btn-click.active').children().attr('data-phone-number');
			var data_text = $('.btn-click.active').children().eq(1).attr('data-text');
      		// console.log(data_id,data_phone_number,data_from_phone_number,data_text);
      		$('#search-chat').val('');
     		$('#phone-id').text(' :'+ data_phone_number +'');
	     	$('#phone_number_01').val(data_phone_number);
	     	$('#from_phone_number_01').val(data_from_phone_number);
	     	$('.messages ul').addClass('block');
	     	$('#search a i').removeClass('block-a');
	     	$.ajax({
				    url: "{{url('list-base-list')}}",
				    type: 'GET',
				    data: {
			 			_token: "{{ csrf_token() }}",
			 			 phone_number: data_phone_number,

			 		},
				    error: function() {
				      alert("lỗi");
				    },
				     success: function(data) {
				     	$(".messages ul").html('');
				        $(".messages ul").append(data); 
				        $('.messages').scrollTop($('.messages ul').height());
				     }
			 	 });    
	     });
	   
		$('.btn-click').click(function() {
			var id = $(this).attr('id');
			var data_id = $(this).attr('data-id');
			var data_from_phone_number =  $(this).attr('data-from-phone-number');
			var data_text = $(this).children().eq(1).attr('data-text');
			data_phone_number=  $(this).children().attr('data-phone-number');
			$('#contacts ul li').removeClass('active');
			$(this).parent().parent('li').addClass('active');
			$('.btn-click').removeClass('active');
			$(this).addClass('active');
			
			$('.contact-profile #search').addClass('block-search');
	     	$('#phone-id').text(' :'+ data_phone_number +'');
	     	$('#phone_number_01').val(data_phone_number);
	     	$('#from_phone_number_01').val(data_from_phone_number);
	     	$('.messages ul').addClass('block');
	     	$('.messages').scrollTop($('.messages ul').height());
			  	$.ajax({
				    url: "{{url('list-base-list')}}",
				    type: 'GET',
				    data: {
			 			 _token: "{{ csrf_token() }}",
			 			 phone_number: data_phone_number
			 		},
				    error: function() {
				      alert("lỗi");
				    },
				     success: function(data) {
				  	 
				     	$(".messages ul").html('');
				        $(".messages ul").append(data); 
				        $('.messages').scrollTop($('.messages ul').height());	
				  	   	page = 2;

				     }
			 	 });
		});

	  	$('.messages').scroll(function(e) {
	  		
	  	 	$('.load-page i').addClass('load-page-block');
			if($('.messages').scrollTop() == 0 && (page >= 2)){
				$.ajax({
				    url: "{{url('list-base-list')}}",
				    type: 'GET',
				    data: {
			 			 _token: "{{ csrf_token() }}",
			 			 phone_number: data_phone_number,
			 			 page : page
			 		},
				    error: function() {
				      alert("lỗi");
				    },
					 success: function(data) {
					 	page ++;
					 	if(data == ""){
					 	}else{
						 	$('.load-page i').removeClass('load-page-block');
					        $(".messages ul").prepend(data); 
					        $('.messages').scrollTop($('.messages ul').height()/2);	
					 	}	
				        
				     }
			 	});
		 	}
		});

	  	// send button messages
   	
		$("#id-chat-1").click(function() {
			  var phone_number = $('#phone_number_01').val();
			  var from_phone_number = $('#from_phone_number_01').val();
			  var text = $('#text_01').val(); 	
			  $('#text_01').val('');
			 	$.ajax({
			 		url: "{{route('send_base')}}",
			 		method: 'POST',
			 		data: {
			 			_token: "{{ csrf_token() }}",
			 			phone_number: phone_number,
			 			from_phone_number: from_phone_number,
			 			text: text,
			 		},
			 		success: function(data) {

			 			var html  = '<li class="replies">';
				        html 	 += '<span> Phone:' + data.phone_number + ',' + data.created_at +'</span><br><br>';
				        html 	 +=	'<p>'+ data.text +'</p>';
				        html 	 +=	'</li>';
				       $(".messages ul").append(html); 
				       $('.meta.active .preview').text(text);
				       $('.messages').scrollTop($('.messages ul').height());
			 		}
			 	});
		});
		//send messages

		$("#form_send_phone").submit(function(e) {
			 e.preventDefault();
			  var phone_number = $('#phone_number').val();
			  var from_phone_number = $('#from_phone_number').val();
			  var text = $('#text').val();
			  $('#phone_number').val('');
			  $('#text').val('');
			  $('#id-chat:before').css("display","block");
			  $('#id-chat').addClass('block-chat');
			  $.ajax({
			    url: "{{route('send_list_base')}}",

			    data: {
			       "_token": "{{ csrf_token() }}",
			       "phone_number": phone_number,
			       "from_phone_number":from_phone_number,
			       "text":text
			      
			    },
			    type: 'POST',
			    error: function() {
			      alert("lỗi");
			    },
			    success: function(data) {	
			    	/*
			    	var html = `
			    		<li class="contact" id="sm-${data.id}">
			    			<div class="wrap" >
			    	`;
			    	console.log(data);
			    		var html = ' ';
			    		foreach($sms as $s){
				    		html     += '<li class="contact" id="phone-'+data.id+'">';
					      	html 	 +=    '<div class="wrap" >' ;
					      	html     += 		'<span class="contact-status online"></span>';
					      	html     += 		'<img style="width: 50px" src="https://via.placeholder.com/40x40" alt="">';
					      	html     += 		'<div class="meta btn-click" id="'+ data.id +'" data-id="'+data.id +'"  data-from-phone-number = "'+ data.from_phone_number +'">'	;
					      	html   	 +=				'<p class="name" data-phone-number="'+ data.phone_number +'">'+ data.phone_number +'</p>';
					      	html   	 +=				'<p class="preview" data-text="'+ data.text +'">'+ data.text +'</p>';
					      	html   	 +=			'</div>';
					      	html   	 +=	   '</div>';
					        html 	 +=	'</li>';
				    	};
				    */
					   $("#contacts ul").html('');
				       $("#contacts ul").prepend(data);
				       $('#contacts').scrollTop(0);

				       $('.meta.active .preview').text(text);
				       $(".modal").hide();
				       $('#id-chat').removeClass('block-chat');


			    	// }
			      
			    }
			  });
		});
	    $('.btn-click')[0].click();
		
	</script>
</body>
</html>