@foreach($category->faq as $faq)
    <ul>
        <li>
            <a href="#collapse{{ $faq->id }}" data-toggle="collapse" aria-expanded="false"
               aria-controls="collapseExample">
                {{ $faq->title }}
            </a>
        </li>
    </ul>
    <div class="collapse" id="collapse{{ $faq->id }}">
        <div class="well">
            {!! $faq->answer !!}
        </div>
    </div>
@endforeach
