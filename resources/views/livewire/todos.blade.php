<div>
    <div class="card">
        <div class="card-body">
          <h3 class="card-title">
                <form action="" wire:submit="save">
                    <div class="row align-center" style="margin-bottom: 1rem">
                        <div class="col-6">
                            <input type="text" class="form-control @error('todo_name') is-invalid @enderror " name="todo_name" placeholder="Buy groceries" wire:model="todo_name">
                            @error('todo_name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-4">
                              <button class="btn btn-primary" type="submit">
                                Create Todo
                            </button>
                        </div>
                    </div>
                </form>            
          </h3>
          
          <table class="table table-sm table-borderless">
            <thead>
              <tr>
                <th>#</th>
                <th>Todo</th>
                <th>Status</th>
                <th class="text-center" width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($todos as $idx=>$todo)
                <tr>
                    <td>
                        {{ $idx + 1 }}
                    </td>
                    <td>
                        @if ($todo->is_completed)
                            <del>{{$todo->todo_name}}</del>
                        @else
                            {{$todo->todo_name}}
                        @endif
                    </td>
                    <td class="text-left">
                        @if ($todo->is_completed)
                            <span class="badge bg-success me-1"></span> Completed
                        @else
                            <span class="badge bg-warning me-1"></span> Ongoing
                        @endif
                    </td>
                    <td class="text-center">
                        <button wire:click="read({{$todo->id}})" type="button" class="btn btn-green btn-icon" aria-label="Read">
                            <svg wire:loading.remove wire:target="read({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M9 12l2 2l4 -4" /></svg>
                            <svg wire:loading.block wire:target="read({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" class="icon icon-rotate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5"></path>
                              </svg>
                        </button>
                        <button wire:click="delete({{$todo->id}})" class="btn btn-red btn-icon" aria-label="Delete">
                            <svg wire:loading.remove wire:target="delete({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" /><path d="M18 13.3l-6.3 -6.3"/></svg>
                            <svg wire:loading.block wire:target="delete({{ $todo->id }})" xmlns="http://www.w3.org/2000/svg" class="icon icon-rotate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4.05 11a8 8 0 1 1 .5 4m-.5 5v-5h5"></path>
                              </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          
        </div>
      </div>
</div>
