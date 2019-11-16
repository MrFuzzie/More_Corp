
<div class="modal fade" id="bidModal" tabindex="-1" role="dialog" aria-labelledby="bidModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="bidModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="bidForm" method="post" action="">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        @if ($errors->has('email'))
                            <br>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <input type="text" class="form-control" id="email" name="email" placeholder="email@example.org" value="{{old('email')}}" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="bid">Bid amount</label>
                        @if ($errors->has('bid'))
                            <br>
                            <span class="text-danger">{{ $errors->first('bid') }}</span>
                        @endif
                        <input type="text" class="form-control" id="bid" name="bid" placeholder="R 0.00" value="{{old('email')}}" autocomplete="off">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="bidForm">Submit</button>
            </div>
        </div>
    </div>
</div>
