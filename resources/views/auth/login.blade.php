<x-w3.layout.authentication>
    <!-- logo start-->
    
    <x-w3.content.logo/>

    <!-- log ends -->
    <form class="w3-container" action="{{route('login')}}" method="POST">
         @csrf
         <div class="w3-section">
             <div class="w3-row w3-padding-small">
                <div class="w3-col s12 m12 l12 w3-left">
                    <label class="w3-text-dark-gray">Username(email)</label>
                    <input class="w3-input w3-border {{($errors->has('email')) ? 'w3-border-red' : 'w3-border-dark-gray'}}" 
                             name="email"
                             type="text"
                            autocomplete="off"
                            placeholder="Enter email username" 
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
                    <label class="w3-text-dark-gray">Password</label>
                    <input class="w3-input w3-border {{($errors->has('password')) ? 'w3-border-red' : 'w3-border-dark-gray'}}" 
                            name="password"
                            type="password" 
                            autocomplete="off"
                            placeholder="Enter password" 
                            value="{{old('password')}}" />
                    @if($errors->has('password'))
                        <span class="w3-small w3-text-red">{{$errors->first('password')}}</span>
                    @else
                        <span>&nbsp;</span>
                    @endif
                 </div>
            </div>
            <div class="w3-row w3-padding-small">
                <div class="w3-col s12 m12 l12 w3-left">
                    <button class="w3-button w3-block w3-blue w3-section w3-padding w3-hover-light-blue w3-large" type="submit">Login</button>
                </div>
            </div>
        </div>
    </form>
    <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <span class="w3-right w3-padding w3-hide-small w3-text-blue w3-hover-text-dark-gray w3-large">
            <a href="{{ route('password.request') }}" style="text-decoration:none;">Forgot password?</a>
        </span>
    </div>
</x-w3.layout.authentication>