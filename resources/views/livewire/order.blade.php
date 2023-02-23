<div>
    <div class="row">
        @if (count($query) > 0)
            @foreach ($query as $item)
                <div class="col-lg-4">
                    <div class="card card-body">
                        <h4 class="card-title">{{ $item->order_id }}</h4>
                        <div class="row">
                            <div class="col-4">
                                <p>Name</p>
                                <p>Phone</p>
                                <p>Email</p>
                                <p>Montir</p>
                                <p>Status</p>
                            </div>
                            <div class="col-8">
                                <p>: {{ $item->name }}</p>
                                <p>: {{ $item->phone }}</p>
                                <p>: {{ $item->email }}</p>
                                <p>: {{ $item->montir->name }}</p>
                                <p>: {{ $item->status }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('order.share', $item->id) }}"
                                    class="btn btn-primary waves-effect waves-light"><i
                                        class="mdi mdi-map-marker-radius"></i>&nbsp;&nbsp;Share</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('order.complete', $item->id) }}"
                                    class="btn btn-{{ $item->status == 'complete' ? 'dark' : 'warning' }} waves-effect waves-light"
                                    style="pointer-events: {{ $item->status == 'complete' ? 'none' : '' }}"><i
                                        class="mdi mdi-progress-check"></i>&nbsp;&nbsp;{{ $item->status == 'created' ? 'Process' : 'Complete' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h1>No data to display</h1>
        @endif
    </div>
</div>
@push('customjs')
    <script>
        $(document).ready(function() {})
    </script>
@endpush
