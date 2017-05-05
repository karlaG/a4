@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <form action="/task" method="POST">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <label for="dueDate">*Due Date</label>
                        <input type="date" name="dueDate" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="task">*Task</label>
                        <textarea rows="5" name="task" class="form-control" required></textarea>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" name="complete" value="">Complete?</label>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-default">Add Task</button>
                      </div>
                      <div class="form-group">
                        <p>* denotes a required field.</p>
                      </div>
                  </form>

                  @if (count($errors) > 0)
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
