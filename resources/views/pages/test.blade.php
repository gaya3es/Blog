@extends('layouts.app')


@section('content')
    <form >
        <table>
            <tr><td>Input 1:<td><input type="text" name="a" id="int"></td></td></tr>
            <tr><td>Input 2:<td><input type="text" name="b" id="int"></td></td></tr>
            <tr><td><td><input type="submit" name="submit"  value="ADD"></td></td></tr>
            <tr><td><td><input type="text" name='sum' value="{{$sum ?? ''}}"></td></td></tr>
        </table>
    </form>
    {{-- <p>{{$sum ?? ''}}</p> --}}
    @endsection
    