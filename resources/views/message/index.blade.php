<x-main-layout>
    @foreach($messages as $message)
        <div>
            <h3>{{$message->name}}</h3>
            <p>{{$message->message}}</p>
        </div>
    @endforeach
</x-main-layout>