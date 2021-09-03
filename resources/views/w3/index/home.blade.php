<x-w3.layout.app>
    <x-slot name="title">
        Home
    </x-slot>
    <x-w3.content.container>
    
        @if (session('notification'))
            <x-w3.content.notification :color="session('notification')['background']" :border="session('notification')['border']" :message="session('notification')['message']"/>
        @endif

        <h2>What is W3.CSS?</h2>

        <p>W3.CSS is a modern CSS framework with built-in responsiveness:</p>

        <ul class="w3-leftbar w3-theme-border" style="list-style:none">
            <li>Smaller and faster than other CSS frameworks.</li>
            <li>Easier to learn, and easier to use than other CSS frameworks.</li>
            <li>Uses standard CSS only (No jQuery or JavaScript library).</li>
            <li>Speeds up mobile HTML apps.</li>
           <li>Provides CSS equality for all devices. PC, laptop, tablet, and mobile:</li>
        </ul>
        <br>
        <hr>
        <h2>Easy to Use</h2>
        <div class="w3-container w3-sand w3-leftbar">
            <p>
                <i>Make it as simple as possible, but not simpler.</i><br>
                Albert Einstein
            </p>
        </div>

        <hr>
        <h2>W3.CSS Web Site Templates</h2>

        <p>We have created some responsive W3CSS templates for you to use.</p>
        <p>You are free to modify, save, share, use or do whatever you want with them:</p>

        <footer class="w3-container w3-theme" style="padding:32px">
            <p>Footer information goes here</p>
        </footer>

        <script>
            myAccordion('menu-item');
            document.getElementById('menu-item-service').className += " menu-item";
        </script>

    </x-w3.content.container>
</x-w3.layout.app>