@extends('admin.layout.mainlayout')
@section('content')
<div class="container-fluid pt-4 px-4" style="direction: rtl; text-align: right;">
    <div class="col-sm-12 col-xl-12">
        <div style="margin-top:18px">
            @foreach ($user->roadmaps  as $roadmap)
            <div style="margin-top:18px">
                {!! $roadmap->result !!}
            </div>
{{-- <pre> {!!!}</pre> --}}

<div class="improvement-plan">
    {!! nl2br(e($roadmap->response)) !!}
</div>
<hr>
{{-- <h2 style="text-align:center; color:#27703b; font-size:24px; margin-bottom:20px;">نتيجة امتحان العربي للروضة والصف الأول</h2> --}}
{{--
<table border="1" style="width:100%; text-align:center; border-collapse:collapse; border:2px solid #27703b; font-family:Arial, sans-serif; font-size:16px;">
    <thead>
        <tr style="background-color:#f4f4f4; color:#27703b;">
            <th style="padding:10px; border:1px solid #27703b;">المهارة</th>
            <th style="padding:10px; border:1px solid #27703b;">النتيجة</th>
            <th style="padding:10px; border:1px solid #27703b;">التقييم</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding:10px; border:1px solid #ddd;">الوعي الصوتي</td>
            <td style="padding:10px; border:1px solid #ddd;">1 / 6</td>
            <td style="padding:10px; border:1px solid #ddd;">16.67%</td>
        </tr>
        <tr style="background-color:#f9f9f9;">
            <td style="padding:10px; border:1px solid #ddd;">قراءة أصوات الحروف</td>
            <td style="padding:10px; border:1px solid #ddd;">2 / 8</td>
            <td style="padding:10px; border:1px solid #ddd;">25.00%</td>
        </tr>
        <tr>
            <td style="padding:10px; border:1px solid #ddd;">الكتابة</td>
            <td style="padding:10px; border:1px solid #ddd;">4 / 4</td>
            <td style="padding:10px; border:1px solid #ddd;">100.00%</td>
        </tr>
    </tbody>
</table>

<p style="text-align:center; margin-top:20px; font-size:18px; color:#27703b;">النتيجة الإجمالية: <strong>38.89%</strong></p> --}}

@endforeach
        </div>
    </div>
    </div>
@endsection
