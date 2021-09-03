<x-w3.layout.app>
    <x-slot name="title">
        Home
    </x-slot>
    <x-w3.content.container>

		<h2>Account</h2>

        @isset($notification)
            <x-w3.content.notification :color="$notification['background']" :border="$notification['border']" :message="$notification['message']"/>
        @endisset

		@if (session('notification'))
            <x-w3.content.notification :color="session('notification')['background']" :border="session('notification')['border']" :message="session('notification')['message']"/>
        @endif

        @isset($account)
		<div class="w3-card-4">

            <header class="w3-container w3-light-grey">
                <h3>John Doe</h3>
            </header>

            <div class="w3-container">
                <p>1 new friend request</p>
                <hr>
                <img src="img_avatar3.png" alt="Avatar" class="w3-left w3-circle">
                <p>President/CEO at Mighty Schools...</p>
            </div>

            <button class="w3-button w3-block w3-dark-grey">+ Connect</button>

        </div>
		@endisset
        
        <script>
            myAccordion('menu-user');
            document.getElementById('menu-user-account').className += " menu-item";
        </script>

    </x-w3.content.container>
</x-w3.layout.app>