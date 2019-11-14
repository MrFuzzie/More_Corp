
    @csrf

    <div class="card-body w-75 mx-auto">

        <div class="form-group">
            <label for="name">Name</label>
            @if ($errors->has('name'))
                <br>
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{old('name') ?? $product->name}}" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            @if ($errors->has('description'))
                <br>
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
            <input type="text" class="form-control" id="description" name="description" value="{{old('description') ?? $product->description}}" placeholder="Enter description" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            @if ($errors->has('price'))
                <br>
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
            <input type="text" class="form-control" id="price" name="price" value="{{old('price')  ?? $product->price}}" placeholder="R" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
