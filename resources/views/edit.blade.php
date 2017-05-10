@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Task</div>

          <div class="panel-body">
            <form action="/save" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $id }}">
              <div class="form-group">
                <label for="dueDate">*Due Date</label>
                <input type="date" name="dueDate" class="form-control" value="{{ $dueDate }}" required>
              </div>
              <div class="form-group">
                <label for="task">*Task</label>
                <textarea rows="5" name="task" class="form-control" required>{{ $task }}</textarea>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" name="complete" checked="{{ $complete }}">Complete?</label>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default">Edit Task</button>
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
