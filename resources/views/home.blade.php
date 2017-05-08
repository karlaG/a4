@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Dashboard</div>

                <!-- Add Task Form -->
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
                        <label><input type="checkbox" name="complete" value="1">Complete?</label>
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

              <!-- Display All Tasks -->
              <div class="panel panel-default">
                  <div class="panel-heading">All Tasks</div>

                  <div class="panel-body">
                      <table class="table table-striped task-table">
                        @if (count($tasks) > 0)
                          <tbody>
                            @foreach ($tasks as $task)
                              <tr>
                                <td class="table-text">{{ $task->dueDate }}</td>
                                <td class="table-text">{{ $task->task }}</td>
                                @if ($task->complete == 1)
                                  <td class="table-text"><b>Incomplete</b></td>
                                @else
                                  <td class="table-text">Complete</td>
                                @endif
                              </tr>
                            @endforeach
                          </tbody>
                        @else
                          <tbody>
                            <tr>
                              <td><em>No tasks to display.</em></td>
                            </tr>
                          </tbody>
                        @endif
                      </table>
                  </div>
              </div>
              <!-- Task Delete Button -->
              <td>
                <form action="{{url('task/' . $task->id)}}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Delete
                  </button>
                </form>
              </td>
        </div>
    </div>
</div>
@endsection
