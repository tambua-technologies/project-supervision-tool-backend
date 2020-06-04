<li class="{{ Request::is('focalPeople*') ? 'active' : '' }}">
    <a href="{{ route('focalPeople.index') }}"><i class="fa fa-edit"></i><span>Focal People</span></a>
</li>

<li class="{{ Request::is('agencyTypes*') ? 'active' : '' }}">
    <a href="{{ route('agencyTypes.index') }}"><i class="fa fa-edit"></i><span>Agency Types</span></a>
</li>

<li class="{{ Request::is('agencies*') ? 'active' : '' }}">
    <a href="{{ route('agencies.index') }}"><i class="fa fa-edit"></i><span>Agencies</span></a>
</li>

<li class="{{ Request::is('units*') ? 'active' : '' }}">
    <a href="{{ route('units.index') }}"><i class="fa fa-edit"></i><span>Units</span></a>
</li>

<li class="{{ Request::is('items*') ? 'active' : '' }}">
    <a href="{{ route('items.index') }}"><i class="fa fa-edit"></i><span>Items</span></a>
</li>

<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{{ route('locations.index') }}"><i class="fa fa-edit"></i><span>Locations</span></a>
</li>

<li class="{{ Request::is('stockTypes*') ? 'active' : '' }}">
    <a href="{{ route('stockTypes.index') }}"><i class="fa fa-edit"></i><span>Stock Types</span></a>
</li>

<li class="{{ Request::is('stockStatuses*') ? 'active' : '' }}">
    <a href="{{ route('stockStatuses.index') }}"><i class="fa fa-edit"></i><span>Stock Statuses</span></a>
</li>

<li class="{{ Request::is('stockGroups*') ? 'active' : '' }}">
    <a href="{{ route('stockGroups.index') }}"><i class="fa fa-edit"></i><span>Stock Groups</span></a>
</li>

