@extends('layouts.app')

@section('content')
    
	<div class="ui-block">
		<div class="ui-block-title">
			<h6 class="title">Chat / Messages</h6>
            {{ $message ?? 'no messages!' }}
			<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
		</div>

		<div class="row">
			<div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12  padding-r-0">

                @include('messages.thread')

			</div>

	        <div class="col col-xl-7 col-lg-6 col-md-12 col-sm-12  padding-l-0">

                

			<form action="{{ route('message.create', 4) }}" method="post">
        @csrf

        <div class="form-group label-floating is-empty">
            <label class="control-label">Write your message here...</label>
            <textarea class="form-control" placeholder=""  name="message"></textarea>
        </div>

        <button class="btn btn-primary btn-sm">Post</button>
        </div>

    </form>

                

            </div>
        </div>
    </div>

@endsection