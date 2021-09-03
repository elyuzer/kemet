<x-w3.layout.app>
    <x-slot name="title">
        Home
    </x-slot>
    <x-w3.content.container>

		<h2>Accounts</h2>

        @isset($notification)
            <x-w3.content.notification :color="$notification['background']" :border="$notification['border']" :message="$notification['message']"/>
        @endisset

		@if (session('notification'))
            <x-w3.content.notification :color="session('notification')['background']" :border="session('notification')['border']" :message="session('notification')['message']"/>
        @endif

        @isset($accounts)
		<div class="w3-responsive w3-white w3-padding-16 w3-text-dark-gray">
			<table class="w3-table-all w3-hoverable">
				<tr class="w3-theme w3-text-white">
					<th>First Name</th>
					<th>Middle name</th>
					<th>Last Name</th>
					<th>Email</th>
					
				</tr>
				@foreach($accounts as $account)
				<tr>
					<td><a href="{{url('account/'.$account->uuid)}}" style="text-decoration:none;">{{$account->first_name}}</a></td>
					<td><a href="{{url('account/'.$account->uuid)}}" style="text-decoration:none;"> {{$account->middle_name}}</a></td>
					<td><a href="{{url('account/'.$account->uuid)}}" style="text-decoration:none;"> {{$account->last_name}}</a></td>
					<td><a href="{{url('account/'.$account->uuid)}}" style="text-decoration:none;"> {{$account->user()->first()->email}}</a></td>
					
				</tr>
				@endforeach
			</table>
		</div>
		<div class="w3-row">
			<span class="w3-left">{{$accounts->links('vendor.pagination.paginator')}}</span>
			<span class="w3-right">
				Showing {{($accounts->currentPage()-1)* $accounts->perPage()+($accounts->total() ? 1:0)}} to {{($accounts->currentPage()-1)*$accounts->perPage()+count($accounts)}}  of  {{$accounts->total()}}  records
			</span>
		</div>
		@endisset
        
        <script>
            myAccordion('menu-user');
            document.getElementById('menu-user-account').className += " menu-item";
        </script>

    </x-w3.content.container>
</x-w3.layout.app>