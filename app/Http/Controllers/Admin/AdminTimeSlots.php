<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use App\Http\Resources\TimeSlotResource;
use App\Http\Requests\AdminTimeSlotRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Enums\DayOfWeek;

class AdminTimeSlots extends Controller
{
    public $days;

    public function __construct()
    {
        $this->days = array_map(fn($day) => $day->value, DayOfWeek::cases());
    }

    public function index() {
        return view('admin.timeslot.timeslots-list', ['days' => $this->days]);
    }

    public function view(Request $request, $day) {
        $slots = TimeSlotResource::collection(TimeSlot::where('day', Str::lower($day))->paginate(10));
        return view('admin.timeslot.view-slots', ['slots' => $slots, 'day' => $day]);
    }

    public function add(Request $request, $day) {
        $slot = null;
        if($request->query('type') == 'edit' && $request->query('slot')) {
            $slot = TimeSlot::where('id', $request->query('slot'))->first();
            if(!$slot) {
                return redirect()->route('admin.slots', ['day' => $day ])->with('error', 'Time slot not found');
            }
        }
        return view('admin.timeslot.add-slot', ['slot' => $slot, 'day' => $day, 'days' => $this->days]);
    }

    public function store(AdminTimeSlotRequest $request, TimeSlot $slot) {
        $validated = $request->validated();
        $slot->create($validated);
        return redirect()->route('admin.slots', ['day' => $validated['day'] ])->with('message', 'Time slot has been created successfully');
    }

    public function update(AdminTimeSlotRequest $request, TimeSlot $slot) {
        $validated = $request->validated();
        $slot->update($validated);
        return redirect()->route('admin.slots', ['day' => $validated['day'] ])->with('message', 'Time slot has been updated successfully');
    }

    public function destroy(Request $request, TimeSlot $slot) {
        $slot->delete();
        return redirect()->route('admin.slots', ['day' =>  $slot->day ])->with('message', 'Time slot has been deleted successfully');
    }
}
