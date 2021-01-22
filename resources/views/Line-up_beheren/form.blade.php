@csrf
@include('shared.alert')

<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="artist_id">Artist</label>
            <select name="artist_id" id="artist_id"
                    class="custom-select @error('artist_id') is-invalid @enderror"
                    required>
                <option value="">Select an artist</option>
                @foreach($artists as $artist)
                    <option value="{{ $artist->id }}"
                            {{ (old('artist_id', $performance->artist_id) ==  $artist->id ? 'selected' : '') }}>{{ ucfirst($artist->name) }}</option>
                @endforeach
            </select>
            @error('artist_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="stage_id">Stage</label>
            <select name="stage_id" id="stage_id"
                    class="custom-select @error('stage_id') is-invalid @enderror"
                    required>
                <option value="">Select a stage</option>
                @foreach($stages as $stage)
                    <option value="{{ $stage->id }}"
                            {{ (old('stage_id', $performance->stage_id) ==  $stage->id ? 'selected' : '') }}>{{ ucfirst($stage->name) }}</option>
                @endforeach
            </select>
            @error('stage_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="festival_id">Festival</label>
            <select name="festival_id" id="festival_id"
                    class="custom-select @error('festival_id') is-invalid @enderror"
                    required>
                <option value="">Select a festival</option>
                @foreach($festivals as $festival)
                    <option value="{{ $festival->id }}"
                            {{ (old('festival_id', $performance->festival_id) ==  $festival->id ? 'selected' : '') }}>{{ ucfirst($festival->name) }}</option>
                @endforeach
            </select>
            @error('festival_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date">Dag</label>
            <input type="date" name="date" id="date"
                   class="form-control @error('date') is-invalid @enderror"
                   placeholder="12"
                   value="{{ old('date', $performance->date) }}"
                   {{--Aanpassen zodat enkel datums van het gekozen festival gekozen kunnen worden--}}
            min="{{$festival->start_date}}"
            max="{{$festival->end_date}}">
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="start_time">Start time</label>
            <input type="text" name="start_time" id="start_time"
                   class="form-control @error('start_time') is-invalid @enderror"
                   placeholder="12"
                   value="{{ old('start_time', $performance->start_time) }}">
            @error('start_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="end_time">End time</label>
            <input type="text" name="end_time" id="end_time"
                   class="form-control @error('end_time') is-invalid @enderror"
                   placeholder="14"
                   required
                   value="{{ old('end_time', $performance->end_time) }}">
            @error('end_time')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <p>
            <button type="submit" id="submit" class="btn btn-success">Artiest opslaan</button>
        </p>
    </div>

</div>

