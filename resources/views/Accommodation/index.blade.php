
@extends('layouts.app')

@section('content')
<style>
.content {
    text-align: center;
}

.title {
    font-size: 6vw;
}

.m-b-md {
    margin-bottom: 30px;
}
</style>
    <div class="content">
        <div class="title m-b-md">
            Accommodation
        </div>
    </div>
<div class="container">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#men"><b>Men</b></a></li>
    <li><a data-toggle="tab" href="#women"><b>Women</b></a></li>
    <li><a data-toggle="tab" href="#vip"><b>VIP</b></a></li>
    <li><a data-toggle="tab" href="#police"><b>Police</b></a></li>

  </ul>
  <div class="tab-content">
  <div id="men" class="tab-pane active">
        <h3>Accommodation Details For Men</h3>
        <p>Accommodation details for men are shown below.</p>
        @if(!Auth::guest())
        <a class="btn btn-success" href="{{ url('/accommodation/create') }}" role="button">Add New Accommodation Details</a>
        <a  id="xlsf" href="{{ URL::to('downloadExcel/accommodations/xls') }}"><button class="btn btn-info">Download Excel xls</button></a>
        <a id="xlsxf" href="{{ URL::to('downloadExcel/accommodations/xlsx') }}"><button class="btn btn-info">Download Excel xlsx</button></a>
        <a id="csvf" href="{{ URL::to('downloadExcel/accommodations/csv') }}"><button class="btn btn-info">Download CSV</button></a>
    @endif

        <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="overflow-x:auto;">
                        <table class="table">
                            <thead>
                                <th>From</th>
                                <th>Accommodation At</th>
                                <th>Near By</th>
                                <th>Status</th>
                                <th>Coordinator</th>
                                <th>Phone</th>
                                <th>Updated at</th>
                                @if(!Auth::guest())
                                <th></th>
                                <th></th>
                            @endif
                            </thead>
                            <tbody>
                                @foreach($accommodations as $acc)
                                    <tr>
                                        @if($acc->gender==0)
                                        <th>{{ $acc->areaName}}</th>
                                        <th>{{ $acc->locationofAcc}}</th>
                                        <th>{{ $acc->nearby}}</th>
                                        <th>@if ($acc->isFull == 1)
                                                <span class="label label-danger">Accommodation Full</span>
                                            @else
                                                <span class="label label-success">Available</span>
                                            @endif</th>

                                        <th>{{ $acc->coord}}</th>
                                        <th>{{ $acc->contact}}</th>
                                        <th>{{ $acc->updated_at}}</th>
                                        @if(!Auth::guest())
                                        <th><a class="btn btn-warning" href="{{ route('accommodation.edit', $acc->id,'/edit') }}" role="button">Update</a></th>
                                        <th>  {{ Form::open(['method' => 'DELETE', 'route' => ['accommodation.destroy', $acc->id]]) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}</th>
                                        @endif
                                @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <strong>Contact:Anu K Manappuram RS<br>Contact no: 9446406800</strong>
            </div>
        </div>
    </div>
    {{$accommodations->links()}}
</div>
        <div id="women" class="tab-pane fade">
            <h3>Accommodation Details For Women</h3>
            <p>Accommodation details for Women are shown below.</p>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @if(!Auth::guest())
                    <a class="btn btn-success" href="{{ url('/accommodation/create') }}" role="button">Add New Accommodation Details</a>
                @endif
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div style="overflow-x:auto;">
                            <table class="table">
                                <thead>
                                    <th>From</th>
                                    <th>Accommodation At</th>
                                    <th>Near By</th>
                                    <th>Status</th>
                                    <th>Coordinator</th>
                                    <th>Phone</th>
                                    <th>Updated at</th>
                                    @if(!Auth::guest())
                                    <th></th>
                                    <th></th>
                                @endif
                                </thead>
                                <tbody>
                                    @foreach($accommodations as $acc)
                                        <tr>
                                        @if($acc->gender==1)
                                            <th>{{ $acc->areaName}}</th>
                                            <th>{{ $acc->locationofAcc}}</th>
                                            <th>{{ $acc->nearby}}</th>
                                            <th>@if ($acc->isFull == 1)
                                                    <span class="label label-danger">Accommodation Full</span>
                                                @else
                                                    <span class="label label-success">Available</span>
                                                @endif</th>

                                            <th>{{ $acc->coord}}</th>
                                            <th>{{ $acc->contact}}</th>
                                            <th>{{ $acc->updated_at}}</th>
                                            @if(!Auth::guest())
                                            <th><a class="btn btn-warning" href="{{ route('accommodation.edit', $acc->id,'/edit') }}" role="button">Update</a></th>
                                            <th>  {{ Form::open(['method' => 'DELETE', 'route' => ['accommodation.destroy', $acc->id]]) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}</th>
                                            @endif
                                        @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{$accommodations->links()}}
</div>

<div id="police" class="tab-pane fade">
    <h3>Accommodation Details For Police</h3>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(!Auth::guest())
            <a class="btn btn-success" href="{{ url('/accommodation/create') }}" role="button">Add New Accommodation Details</a>
        @endif
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading">Police Men</div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                    <table class="table">
                        <thead>
                            <th>From</th>
                            <th>Accommodation At</th>
                            <th>Near By</th>
                            <th>Status</th>
                            <th>Coordinator</th>
                            <th>Phone</th>
                            <th>Updated at</th>
                            @if(!Auth::guest())
                            <th></th>
                            <th></th>
                        @endif
                        </thead>
                        <tbody>
                            @foreach($accommodations as $acc)
                                <tr>
                                @if($acc->gender==2)
                                    <th>{{ $acc->areaName}}</th>
                                    <th>{{ $acc->locationofAcc}}</th>
                                    <th>{{ $acc->nearby}}</th>
                                    <th>@if ($acc->isFull == 1)
                                            <span class="label label-danger">Accommodation Full</span>
                                        @else
                                            <span class="label label-success">Available</span>
                                        @endif</th>

                                    <th>{{ $acc->coord}}</th>
                                    <th>{{ $acc->contact}}</th>
                                    <th>{{ $acc->updated_at}}</th>
                                    @if(!Auth::guest())
                                    <th><a class="btn btn-warning" href="{{ route('accommodation.edit', $acc->id,'/edit') }}" role="button">Update</a></th>
                                    <th>  {{ Form::open(['method' => 'DELETE', 'route' => ['accommodation.destroy', $acc->id]]) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}</th>
                                    @endif
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            {{$accommodations->links()}}

            <div class="panel panel-default">
                <div class="panel-heading">Police Women</div>
                <div class="panel-body">
                    <div style="overflow-x:auto;">
                    <table class="table">
                        <thead>
                            <th>From</th>
                            <th>Accommodation At</th>
                            <th>Near By</th>
                            <th>Coordinator</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            @if(!Auth::guest())
                            <th></th>
                            <th></th>
                        @endif
                        </thead>
                        <tbody>
                            @foreach($accommodations as $acc)
                                <tr>
                                @if($acc->gender==3)
                                    <th>{{ $acc->areaName}}</th>
                                    <th>{{ $acc->locationofAcc}}</th>
                                    <th>{{ $acc->nearby}}</th>
                                    <th>@if ($acc->isFull == 1)
                                            <span class="label label-danger">Accommodation Full</span>
                                        @else
                                            <span class="label label-success">Available</span>
                                        @endif</th>

                                    <th>{{ $acc->coord}}</th>
                                    <th>{{ $acc->contact}}</th>
                                    <th>{{ $acc->updated_at}}</th>
                                    @if(!Auth::guest())
                                    <th><a class="btn btn-warning" href="{{ route('accommodation.edit', $acc->id,'/edit') }}" role="button">Update</a></th>
                                    <th>  {{ Form::open(['method' => 'DELETE', 'route' => ['accommodation.destroy', $acc->id]]) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}</th>
                                    @endif
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            {{$accommodations->links()}}

        </div>
    </div>
</div>
</div>

          <div id="vip" class="tab-pane fade">
      <h3>VIP</h3>
      <div class="container">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  @if(!Auth::guest())
                  <a class="btn btn-success" href="{{ url('/accommodation/create') }}" role="button">Add New Accommodation Details</a>
              @endif
                  <hr>
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div style="overflow-x:auto;">
                          <table class="table">
                              <thead>
                                  <th>From</th>
                                  <th>Accommodation At</th>
                                  <th>Near By</th>
                                  <th>Status</th>
                                  <th>Coordinator</th>
                                  <th>Phone</th>
                                  <th>Updated at</th>
                                  @if(!Auth::guest())
                                  <th></th>
                                  <th></th>
                              @endif
                              </thead>
                              <tbody>
                                  @foreach($accommodations as $acc)
                                      <tr>
                                      @if($acc->gender==4)
                                          <th>{{ $acc->areaName}}</th>
                                          <th>{{ $acc->locationofAcc}}</th>
                                          <th>{{ $acc->nearby}}</th>
                                          <th>@if ($acc->isFull == 1)
                                                  <span class="label label-danger">Accommodation Full</span>
                                              @else
                                                  <span class="label label-success">Available</span>
                                              @endif</th>

                                          <th>{{ $acc->coord}}</th>
                                          <th>{{ $acc->contact}}</th>
                                          <th>{{ $acc->updated_at}}</th>
                                          @if(!Auth::guest())
                                          <th><a class="btn btn-warning" href="{{ route('accommodation.edit', $acc->id,'/edit') }}" role="button">Update</a></th>
                                          <th>  {{ Form::open(['method' => 'DELETE', 'route' => ['accommodation.destroy', $acc->id]]) }}
                                          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                          {{ Form::close() }}</th>
                                          @endif
                                      @endif
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{$accommodations->links()}}

    </div>

</div>
</div>
@include('layouts.footer')

@endsection
