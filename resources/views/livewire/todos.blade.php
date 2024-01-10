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
                            {{-- <label class="form-check">
                                <input class="form-check-input" name="is_completed" wire:model="is_completed" type="checkbox">
                                <span class="form-check-label">Is completed?</span>
                              </label> --}}
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
                        
                        <button wire:click="read({{$todo->id}})" class="btn btn-green btn-icon" aria-label="Read">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M9 12l2 2l4 -4" /></svg>
                        </button>
                        {{-- <button wire:click="update({{$todo->id}})" class="btn btn-primary btn-icon" aria-label="Read">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                        </button> --}}
                        <button wire:click="delete({{$todo->id}})" class="btn btn-red btn-icon" aria-label="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3" /><path d="M18 13.3l-6.3 -6.3"/></svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>
