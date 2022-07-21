@extends('front.pc.particle.layout')
@section('title') bloGig-{{ $autherData->name }}の部屋@endsection
@section('css')
    <link rel="stylesheet" href="{{ mix('css/front/pc/auther.css') }}">
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <div id="auther_detail" class="">
        <section id="introduction">
            <h2>自己紹介</h2>
            <div class="blogger_even">
                @if (!empty($autherData->image))
                    <img src="{{ asset('storage/profile/'. $autherData->image) }}" class="fadeUpTrigger">
                @else
                    <img src="{{ mix('img/front/pc/face_test.png') }}" class="fadeUpTrigger">
                @endif
                <div class="fadeUpTrigger blogger_name">
                    {{ $autherData->name }}
                </div>
                <div class="fadeUpTrigger blogger_explain">
                    <div class="blogger_explain_title">profile</div>
                    <p class="blogger_explain_detail">{!! nl2br(e($autherData->explain)) !!}</p>
                    <div class="blogger_explain_title">更新予定</div>
                    <ul class="blogger_explain_detail">
                        <a href=""><li>競馬</li></a>
                        <a href=""><li>投資</li></a>
                        <a href=""><li>音楽</li></a>
                        <a href=""><li>プログラミング</li></a>
                        <a href=""><li>料理</li></a>
                    </ul>
                </div>
            </div>
        </section>

        <section id="recommend">
            {{--@if(isset($pickupList) && is_countable($pickupList))--}}
                @include('front.pc.particle.pickUp')
            {{--@endif--}}
        </section>

    </div>
</div>
@endsection