@foreach($notifications as $notification)
    <li class="notification">
        <h6 class="notificationTitle"> </h6>
        <p>{{$notification->desc}}</p>
        <div class=" date">
            <div class=" me-2"> <i class="fas fa-calendar-alt me-2"></i> {{date("m/d/Y",strtotime($notification->created_at))}} </span> </div>
            <div> <i class="far fa-clock me-2"></i> {{date("h:i A",strtotime($notification->created_at))}} </span> </div>
        </div>
    </li>
@endforeach

