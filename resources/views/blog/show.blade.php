@include('layouts.header')

	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="text-center">{{ $post[0]->title }}
				<br>
				</h2>
				<hr>
				{!! $post[0]->content !!}
				<hr>
				
			</div>
		</div>
	</div>

</div>

@include('layouts.footer')