
	@foreach($sms as $s)
		<li class="contact" id="sm-{{$s['id']}}">
			<div class="wrap">
				<span class="contact-status online"></span>
				<img style="width: 70px" src="https://via.placeholder.com/40x40" alt="">
				<div class="meta btn-click " id="{{$s['id']}}" data-id="{{$s['id']}}"  data-from-phone-number = "{{$s['from_phone_number']}}">
					<p class="name" data-phone-number="{{$s['phone_number']}}">{{$s['phone_number']}}</p>
					<p class="preview" data-text="{{$s['text']}}">{{$s['text']}}</p>
				</div>
			</div>
		</li>
	@endforeach
	
	