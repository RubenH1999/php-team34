
    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control
                @error('name') is-invalid @enderror"
                       placeholder="Name"
                       minlength="3"
                       required
                       value="{{ old('name', $medewerkershift->shift->name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" id="location" class="form-control
                    @error('location') is-invalid @enderror"
                       placeholder="Location"
                       minlength="3"
                       maxlength="255"
                       required
                       value="{{ old('location', $medewerkershift->shift->location) }}">
                @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control
                    @error('date') is-invalid @enderror"
                       minlength="3"
                       maxlength="255"
                       required

                       value="{{ old('date', date('Y-m-d', strtotime($medewerkershift->shift->date))) }}">
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>


            <div class="form-group">

                <label for="start_time">Time</label>
                <div class="row">
                    <div class="col-lg-6">
                <input type="time" name="start_time" id="start_time" class="form-control
                    @error('start_time') is-invalid @enderror"
                       minlength="3"
                       maxlength="255"
                       required

                       value="{{ old('start_time', $medewerkershift->shift->start_time) }}">
                @error('start_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

                    <div class="col-lg-6">
                <input type="time" name="end_time" id="end_time" class="form-control
                    @error('end_time') is-invalid @enderror"
                       minlength="3"
                       maxlength="255"
                       required

                       value="{{ old('end_time',  $medewerkershift->shift->end_time) }}">
                @error('end_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                    </div>
            </div>
            </div>


                <table class="table table-bordered" id="medewerker">
                    <tr>
                        <td>Medewerkers</td>
                        <td><button type="button" class="btn btn-success" name="add" id="add">Meer medewerkers toevoegen</button></td>
                    </tr>
                    @if ($medewerkershift->shift->number_of_employees != 0)
                       @for ($i = 0; $i < 2; $i++)



                            <tr id="2">

                                <td> <select name="user_id" id="user_id" class="custom-select @error('user_id') is-invalid @enderror"
                                             required>
                                        <option value="">Select a employee</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ (old('user', $medewerkershift->user_id) ==  $user->id ? 'selected' : '') }}>{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</option>
                                        @endforeach
                                    </select></td>
                                <td> <button type="button" name="remove" class="btn btn-danger btn_verwijder" id="2">X</button></td>
                            </tr>

                            @endfor



                    @else
                        <tr id="1">

                            <td> <select name="user_id" id="user_id" class="custom-select @error('user_id') is-invalid @enderror"
                                         required>
                                    <option value="">Select a employee</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ (old('user', $medewerkershift->user_id) ==  $user->id ? 'selected' : '') }}>{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</option>
                                    @endforeach
                                </select></td>

                        </tr>

                        @endif

                </table>




            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" id="department" class="form-control
                    @error('department') is-invalid @enderror"
                       minlength="3"
                       maxlength="255"
                       required

                       value="{{ old('department', $medewerkershift->shift->department) }}">
                @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="task_id">Task</label>
                    <select name="task_id" id="task_id" class="custom-select @error('task_id') is-invalid @enderror"
                    required>
                        <option value="">Select a task</option>
                    @foreach ($tasks as $task)
                            <option value="{{ $task->id }}"
                                {{ (old('task_id', $medewerkershift->shift->task_id) ==  $task->id ? 'selected' : '') }}>{{ ucfirst($task->name) }}</option>
                    @endforeach
                        </select>


                </div>

            </div>
            <div class="form-group">
                <label for="remark">Remark</label>
                <input type="text" name="remark" id="remark" class="form-control
                    @error('remark') is-invalid @enderror"
                       minlength="3"
                       maxlength="255"


                       value="{{ old('remark', $medewerkershift->shift->remark) }}">
                @error('remark')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror


            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success opslaan">Save shift</button>

    @section('script_after')
        <script>
            $(function () {
                var i=0;

                $('tbody').on('click', '#add', function () {

                    i++;
                        $('#medewerker').append('<tr id="row'+i+'"> <td><select name="user2" id="user_id" class="custom-select @error('user_id') is-invalid @enderror" required> <option value="">Select a employee</option>@foreach ($users as $user)<option value="{{ $user->id }}"{{ (old('user_id', $medewerkershift->user_id) ==  $user->id ? 'selected' : '') }}>{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</option>@endforeach</select></td> <td> <button type="button" name="remove" class="btn btn-danger btn_remove" id="'+i+'">X</button></td></tr>')

                    });

                $('tbody').on('click', '.btn_remove', function () {
                    var button_id = $(this).attr("id");
                    $("#row"+button_id+"").remove();

                });
                $('tbody').on('click', '.btn_verwijder', function () {
                    var button_id = $(this).attr("id");
                    $("#"+button_id+"").remove();

                });
            });

        </script>
    @endsection


