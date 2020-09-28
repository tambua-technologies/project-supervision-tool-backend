

<li class="{{ Request::is('focalPeople*') ? 'active' : '' }}">
    <a href="{{ route('focalPeople.index') }}"><i class="fa fa-edit"></i><span>Focal People</span></a>
</li>

<li class="{{ Request::is('implementingPartners*') ? 'active' : '' }}">
    <a href="{{ route('implementingPartners.index') }}"><i class="fa fa-edit"></i><span>Implementing Partners</span></a>
</li>

