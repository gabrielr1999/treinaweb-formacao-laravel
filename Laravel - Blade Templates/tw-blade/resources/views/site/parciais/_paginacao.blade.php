<nav aria-label="Page navigation example" style="margin-top: 50px;">
    <ul class="pagination pagination-lg">
        <li class="page-item"><a class="page-link" href="#">{{ $first }}</a></li>

        @for($i=1; $i < 10; $i++)
            <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
        @endfor

        <li class="page-item"><a class="page-link" href="#">{{ $last }}</a></li>
    </ul>
</nav>