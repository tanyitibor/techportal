<div class="pagination">
  @if($results->currentPage() > 1)
  <div class="prev float-left"><a href="{{$results->previousPageUrl()}}">Previous</a></div>
  @endif
  @if($results->hasMorePages())
  <div class="next float-right"><a href="{{$results->nextPageUrl()}}">Next</a></div>
  @endif
</div>
