
@foreach($sms as $s)
		<li class="replies" >
			<span> {{ __('phone') }}: {{ $s['phone_number']}}, {{date('H:i', strtotime($s['created_at']))}}  </span><br><br>
	    	<p>{{$s['text']}}</p>
		</li>
@endforeach

