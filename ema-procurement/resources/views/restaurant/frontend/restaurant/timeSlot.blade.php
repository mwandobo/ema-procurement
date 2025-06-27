@if(!blank($timeSlots))
    <input type="hidden" id="TimeSlotId" name="time_slot">
    @foreach($timeSlots as $timeSlot)
        <div class="time-slot">
            <input type="radio"  id="time-slot-{{$timeSlot['id']}}">
            <label for="time-slot-{{$timeSlot['id']}}">
                <p class="time-slot-p">{{$timeSlot['id']}}</p>
                <strong>{{ date('h:i A', strtotime($timeSlot['start_time'])) }} - {{ date('h:i A', strtotime($timeSlot['end_time'])) }}</strong>
                <span>{{__('frontend.slot_available')}}</span>
            </label>
        </div>
    @endforeach
@else
    <input type="hidden" id="TimeSlotId" name="time_slot">
    <div class="time-slot">
        <input type="radio"  id="time-slot-0">
        <label for="time-slot-0">
            <p class="time-slot-p">{{__('0')}}</p>
            <strong>{{__('frontend.slot_not_available')}}</strong>
            <span>{{ __('frontend.select_another_date') }}</span>
        </label>
    </div>
@endif

