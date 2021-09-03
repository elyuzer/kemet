<x-w3.layout.authentication>
    <!-- logo start-->
    
    <x-w3.content.logo/>

    <!-- log ends -->
    <x-w3.content.auth-status/>
    
    <form class="w3-container" method="POST" action="{{ route('password.email') }}">
         @csrf
        <div class="w3-section">
            <div class="w3-row w3-padding-small">
                <div class="w3-col s12 m12 l12 w3-left">
                    <label class="w3-text-dark-gray">Email address</label>
                    <input class="w3-input w3-border {{($errors->has('email')) ? 'w3-border-red' : 'w3-border-dark-gray'}}" 
                            name="email"
                            type="text"
                            placeholder="Enter email to recover your logging in credentials" 
                            value="{{old('email')}}" />
                       @if($errors->has('email'))
                        <span class="w3-small w3-text-red">{{$errors->first('email')}}</span>
                    @else
                        <span>&nbsp;</span>
                    @endif
                </div>
            </div>
                    
            <div class="w3-row w3-padding-small">
                <div class="w3-col s12 m12 l12 w3-left">
                    <button class="w3-button w3-block w3-blue w3-section w3-padding w3-hover-light-blue w3-large" type="submit">Send</button>
                </div>
             </div>
        </div>
    </form>
    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <span class="w3-right w3-padding w3-hide-small w3-text-blue w3-hover-text-dark-gray w3-large">
            <a href="{{ route('login') }}" style="text-decoration:none;">Go back to login form.</a>
        </span>
    </div>
</x-w3.layout.authentication>