<li class="{{ Request::is('focalPeople*') ? 'active' : '' }}">
    <a href="{{ route('focalPeople.index') }}"><i class="fa fa-edit"></i><span>Focal People</span></a>
</li>

<li class="{{ Request::is('agencyTypes*') ? 'active' : '' }}">
    <a href="{{ route('agencyTypes.index') }}"><i class="fa fa-edit"></i><span>Agency Types</span></a>
</li>

