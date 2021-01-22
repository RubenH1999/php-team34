@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">


            <select class="form-control select" required name="shift_id" id="shift_id">
                <option value="">Datums met shift</option>
                @foreach($employeeShifts as $employeeShift)
                    <option value="{{ $employeeShift->id }}">{{$employeeShift->shift->date}} - {{$employeeShift->shift->name}}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="reason_absence">reden afwezigheid:</label>
            <textarea  type="text" name="reason_absence" id="reason_absence"
                      placeholder="reden afwezigheid"
                      class="form-control {{ $errors->first('reason_absence') ? 'is-invalid' : '' }}"
            ></textarea>

            <div class="invalid-feedback">{{ $errors->first('reason_absence') }}</div>
        </div>



        <p>
            <button type="submit" id="submit" class="btn btn-success">Afwezigheid melden</button>
        </p>
    </div>

</div>
</form>

