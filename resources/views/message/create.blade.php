<x-main-layout>
       <div id="text"></div>

    <form action="{{route('messages.store')}}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea name="message" id="textMessage" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button type="submit">Send</button>
        </div>
    </form>

</x-main-layout>