@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-8">
            <form method="post" action="{{url('admin/master/reward/edit/'.$reward->reward_id)}}">
                @csrf
                <div class="form-group">
                    <label for="reward_title">Reward Title</label>
                    <input type="text" class="form-control" name="reward_title" id="reward_title"
                        placeholder="Reward Title" value="{{$reward->reward_title}}">
                </div>
                <div class="form-group">
                    <label for="reward_description">Reward Description</label>
                    <textarea name="reward_description" id="reward_description" cols="30" rows="5" class="form-control" placeholder="Reward Description">{{$reward->reward_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="reward_cost">Reward Cost</label>
                    <input type="text" class="form-control" name="reward_cost" id="reward_cost"
                        placeholder="Reward cost 1-200 coin" value="{{$reward->reward_cost}}">
                </div>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
