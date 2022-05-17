@if (Auth::check())
<div class="col-md-4">
    <h3>Contribute a Link</h3>
    <div class="card card-default">
        <div class="card-body">
            <form method="POST" action="/community">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="Channel"></label>
                    <select class="form-control {{ $errors->has('channel_id') ? 'border border-danger' : '' }}" name="channel_id">
                        <option selected disabled>Pick a Channel...</option>
                        @foreach ($channels as $channel)
                            <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                {{ $channel->title }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('channel_id', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'border border-danger' : '' }}" name="title" id="title" placeholder="What is the title of your article?" required>

                    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" value="{{ old('link') }}" class="form-control {{ $errors->has('title') ? 'border border-danger' : '' }}" name="link" id="link" placeholder="What is the URL?" required>

                    {!! $errors->first('link', '<span class="text-danger">:message</span>') !!}
                </div>
                <div class="form-group">
                    <button class="btn-info">Contribute Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
