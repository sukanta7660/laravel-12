{{-- => include
=> extends
=> yield
=> section
=> php
=> if
=> for
=> foreach


@include('user.a')
@php
   $a = 10;
   $b = 10;
   $sum = $a+ $b;
   $arr = array("red","green");
@endphp

{{$sum}}
@if ($a > 10)
    jhxhghjxgjhg
@elseif ($a < 10)
djkhkjdh
@elseif ($a < 10)
djkhkjdh
@elseif ($a < 10)
djkhkjdh
@else
kjhjkhkjsyd
@endif

@for ($i = 1; $i<10; $i++)
   {{$i}}
@endfor

@foreach ($arr as $key => $item)
    {{$item}}
@endforeach --}}

@extends('user.welcome')
