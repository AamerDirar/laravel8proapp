@foreach ($pages as $page)
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header">
            <h3><a href="javascript:void(0)">{{ $page->title }}</a></h3>
        </div>
        <div class="card-body">
            <p>{{ $page->body }}</p>
            <div class="text-center">
                <button type="button" class="btn btn-success">Read More</button>
            </div>
        </div>
    </div>
@endforeach
