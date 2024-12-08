@extends('admin.layout.mainlayout')
@section('content')
<div class="container-fluid pt-4 px-4" style="direction: rtl; text-align: right;">
    <div class="col-sm-12 col-xl-12">
        <div style="margin-top:18px">
            @if ($user->roadmaps->isEmpty())
                <p style="color: red; text-align: center; font-size: 18px;">لا توجد نتائج حالياً.</p>
            @else
                @foreach ($user->roadmaps as $roadmap)
                    <div style="margin-top:18px">
                        {!! $roadmap->result !!}
                    </div>
                    <p> المستوى :{{ $roadmap->level }}</p>
                    <div class="improvement-plan">
                        {!! nl2br(e($roadmap->response)) !!}
                    </div>
                    <hr>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
