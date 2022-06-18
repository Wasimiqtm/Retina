
@if ($paginator->hasPages())
                                <ul class="pagination nav justify-content-center">
                                    

       
        @if ($paginator->onFirstPage())
            <!-- <li class="disabled"><span>← Previous</span></li> -->
 <li class="disabled">
            <a class="page-link" ><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a></li>
        @else
        <li class="disabled">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a></li>
            <!-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li> -->
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="active"><a class="page-link" href>{{ $page }}</a></li>
                        <!-- <li class="active my-active"><span>{{ $page }}</span></li> -->
                    @else
                        <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())

            <li><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a></li>
        @else
            <li class="disabled"><a class="page-link"><span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a></li>
        @endif
    </ul>
@endif 