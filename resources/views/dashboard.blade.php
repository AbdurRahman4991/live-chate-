<x-app-layout>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                @foreach ($UserInfo as $item)
                    <div class="userBody" data-id={{ $item->id }}>
                        <img src="{{ asset('/images') }}/{{ $item->avatar }}" alt="img">{{ $item->name }}
                        <sup id="{{ $item->id }}-status" class="offline-status">offline</sup>
                    </div>
                @endforeach
            </div>

            <div class="col-md-8">
                <h1 id="chateTitle">Get your chate</h1>
                <div class="chatBody">
                    <div class="chatBorad">

                        <h1 class="current_user"> Current user </h1>
                        <h1 class="reciver"> Reciver </h1>
                    </div>
                    <form>
                        @csrf()
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="chat-fomr">Send</button>
                            <input type="text" class="form-control" name='message'id="chatMessage"
                                placeholder="type your mind" aria-label="Example text with button addon"
                                aria-describedby="saveChatBtn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
