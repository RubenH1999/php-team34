@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="name">Titel: </label>
            <input type="text" name="title" id="title"
                   class="form-control"
                   placeholder="Titel"
                   value="{{ old('title', $newsitems->title) }}"
            >
        </div>


        <div class="form-group">
            <label for="name">descriptie: </label>
            <textarea type="text" name="description" id="description"
                   class="form-control"
                   placeholder="descriptie"
                   value="{{ old('description', $newsitems->description) }}"
            ></textarea>
        </div>


        <p>
            <button type="submit" id="submit" class="btn btn-success">Nieuwsitem Opslaan</button>
        </p>
    </div>

</div>
