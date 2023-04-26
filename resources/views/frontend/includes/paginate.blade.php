@if ($paginator->hasPages())
	@if (!$paginator->onFirstPage())
		<li>
			<a href="{{ $paginator->previousPageUrl() }}">
				<i class="icon-arrow-left"></i>
			</a>
		</li>
	@endif

	@foreach ($elements as $element)
		@if (is_array($element))
			@foreach ($element as $page => $url)
				@if ($page == $paginator->currentPage())
					<li>
						<a class="current" href="javascript:void(0);">{{ $page }}</a>
					</li>
				@else
					<li>
						<a href="{{ $url }}">{{ $page }}</a>
					</li>
				@endif
			@endforeach
		@endif
	@endforeach

	@if ($paginator->hasMorePages())
		<li>
			<a href="{{ $paginator->nextPageUrl() }}">
				<i class="icon-arrow-right"></i>
			</a>
		</li>
	@endif
@endif
