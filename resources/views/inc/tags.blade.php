<div class="col-md-4">
    <div class="card border-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header">Tags</div>
        <div class="card-body">
            @if(count($tags))
                @foreach ($tags as $tag)
                    <a href="/posts/tags/{{$tag->name}}" class="badge badge-success" style="font-size:1.75rem;margin:0.5rem">{{$tag->name}}</a>
                @endforeach     
            @endif   
        </div>
    </div>
</div>