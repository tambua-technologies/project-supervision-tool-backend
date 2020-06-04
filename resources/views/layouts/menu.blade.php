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

