@props(['status'])
@if (session('status'))
    <div class="w3-panel w3-display-container w3-leftbar w3-text-brown w3-pale-green w3-border-green">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button w3-pale-green w3-large w3-display-topright">&times;</span>
        <p>{{ session('status') }}</p>
    </div>
 @endif